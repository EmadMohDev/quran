<?php

namespace App\Http\Controllers;

use App\Models\Ayah;
use App\Models\Edition;
use App\Models\EditionLang;
use App\Models\Post;
use App\Models\Provider;
use App\Models\Surah;
use App\Models\Category;
use App\Models\Azkar;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FrontendController extends Controller
{
    protected $slider_limit = 10;
    protected $pagination_limit = 21;
    protected $tafsir_limit = 6;
    protected $edition_limit = 6;
    protected $category_limit = 6;

    public function __construct()
    {
        if ( session('applocale') == null ) {
            session()->put('applocale', 'ar');
        }

        if ( !session()->has('theme') ) {
            session(['theme' => setting('theme_dark') ? 'dark' : 'white']);
        }

        if (!setting('enable_testing') && !request()->has('opId')) {
            abort(404);
        }

        Paginator::defaultView('vendor.pagination.default');
    }

    public function changeLang ($lang)
    {
        if (array_key_exists($lang, config()->get('languages'))) {
            session()->put('applocale', $lang);
        }
        return redirect()->back();
    }

    public function index()
    {
        $providers = Provider::Published()->Active()->where(['feature' => 0, 'home_provider_section' => 1])->take(6)->inRandomOrder()->get();

        $editions=clone $editions2=clone $mofasers = clone $sliders2 = clone $sliders = Edition::Published()->Active()->with('lang');

        $sliders  = $sliders->whereHas('provider', function ($query) {
            return $query->whereHasFeature();
        })->take($this->slider_limit)->inRandomOrder()->get();

        if ($sliders->count() < $this->slider_limit) {
            $sliders2  = $sliders2->whereHas('provider', function ($query) {
                return $query->where(['feature' => 0, 'home_edition_section' => 0, 'home_provider_section' => 0]);
            })->take( ($this->slider_limit - $sliders->count()) )->inRandomOrder()->get();
            $sliders = $sliders->merge($sliders2);
        }

        $mofasers  = $mofasers->Tafsir()->whereHas('provider', function ($query) {
            return $query->where('feature', 0);
        })->orderBy('id', 'asc')->take($this->edition_limit)->inRandomOrder()->get();

        $editions  = $editions->whereHas('provider', function ($query) {
            return $query->where('home_edition_section', 1)->where('feature', 0);
        })->take($this->edition_limit)->inRandomOrder()->get();

        $tafsers  = Ayah::Published()->select('text', 'surah_id', 'order_in_surah', 'number')->Tafsir()->take($this->tafsir_limit)->inRandomOrder()->get();

        foreach ($tafsers as $tafser) {
            $ayah_text = Ayah::Quran($tafser->surah_id)->where(['order_in_surah' => $tafser->order_in_surah, 'number' => $tafser->number])->first();
            $tafser->ayah_text = $ayah_text->text ?? '';
        }

        $categories  = Category::select('title', 'id', 'feature')->Feature()->inRandomOrder()->take($this->category_limit)->get();

        $counter['providers']   = Provider::Published()->Active()->count();
        $counter['editions']    = Edition::Published()->Active()->select('id', 'name', 'identifier', 'name_en', 'provider_id')->count();
        $counter['languages']   = EditionLang::Published()->count();
        $counter['azkars']      = Azkar::count();
        return view('frontend.home.index', compact('providers', 'editions', 'counter', 'tafsers', 'sliders', 'mofasers', 'categories'));
    }

    public function providers()
    {
        if (request()->ajax()) {
            $providers = Provider::Published()->where('name', 'like', '%'.request()->search.'%')->orWhere('name_en', 'like', '%'.request()->search.'%')->Active()->paginate($this->pagination_limit);
            return view('frontend.includes.ajax-request.providers', compact('providers'));
        }
        return view('frontend.pages.providers');
    }

    public function editions(Request $request, $provider = null)
    {
        if (request()->ajax()) {
            $editions = Edition::when(request()->search, function ($q) {
                return $q->where('identifier', 'like', '%'.request()->search.'%');
            })->when($provider, function ($query) use ($provider) {
                return $query->where('provider_id', $provider);
            })->when(request()->type_id, function ($query) {
                return $query->where('edition_type_id', request()->type_id);
            })->Published()->Active()->paginate($this->pagination_limit);

            return view('frontend.includes.ajax-request.editions', compact('editions'));
        }

        $provider = Provider::Active()->where('id', $provider)->first();

        return view('frontend.pages.editions', compact('provider'));
    }

    public function quran(Request $request)
    {
        $url = request()->route()->uri;
        if (request()->ajax()) {
            $editions = Edition::when(request()->search, function ($query) {
                return $query->where('identifier', 'like', '%'.request()->search.'%')->orWhere('name', 'like', '%'.request()->search.'%')->orWhere('name_en', 'like', '%'.request()->search.'%');
            });
            $editions =  $url == 'quran' ? $editions->Quran() : $editions->Tafsir();
            $editions = $editions->Published()->when(request()->lang, function ($query) {
                return $query->where('edition_lang_id', request()->lang);
            })->Active()->get();

            return view('frontend.editions.rows', compact('editions', 'url'));
        }

        $title = trans('quran.'.request()->route()->uri);
        $langs = EditionLang::Langs($url)->pluck('name', 'id');

        return view('frontend.editions.index', compact('title', 'langs'));
    }

    public function showQuran(Request $request, $identifier, $surah)
    {
        if (request()->ajax()) {

            if (request()->lang_id) {
                return Edition::Active()->Type(checkInUrl('quran'))->select('edition_type_id', 'id','identifier', 'name', 'name_en', 'edition_lang_id')->Published()->where('edition_lang_id', $request->lang_id)->get();
            }

            $ayahs = Ayah::where(['edition_id' => request()->edition, 'surah_id' => request()->surah])->where('order_in_surah', '>=', request()->ayah)->Published()->orderBy('order_in_surah')->get();
            if (checkInUrl('quran')) {
                return view('frontend.editions.quran', compact('ayahs'));
            }

            $text = Ayah::Quran(request()->surah)->when(request()->ayah, function ($query) {
                return $query->where('order_in_surah', '>=', request()->ayah);
            })->with('audios')->orderBy('order_in_surah')->get();
            return view('frontend.editions.tafsir', compact('ayahs', 'text'));
        }

        $url = explode('/', $request->route()->uri)[0];
        $langs = EditionLang::Langs($url)->pluck('name', 'id');

        $editions   = Edition::Active()->Type(checkInUrl('quran'))->select('edition_type_id', 'id','identifier', 'name', 'name_en', 'edition_lang_id')->Published()->get();
        $current_edition = Edition::select('edition_type_id', 'id','identifier', 'name', 'name_en', 'edition_lang_id')->where('identifier', $identifier)->first();
        $surahs     = Surah::select('id', 'name', 'name_en', 'count_of_ayahs')->orderBy('number')->get();
        return view('frontend.editions.show', compact('editions', 'surahs', 'current_edition', 'langs'));
    }

    public function surahs(Request $request)
    {
        if (request()->ajax()) {
            $surahs = Surah::when(request()->search, function ($q) {
                return $q->where('name', 'like', '%'.request()->search.'%')->orWhere('name_en', 'like', '%'.request()->search.'%');
            })->get();
            return view('frontend.includes.ajax-request.surahs', compact('surahs'));
        }

        return view('frontend.pages.surahs');
    }

    public function published()
    {
        $ayah = Ayah::with(['surah', 'edition'])->WillPublished()->where('id', request()->ayah)->first();
        if ($ayah) {
            if (!setting('view_coming_post')) {
                return view('frontend.content.comming-soon');
            }
        } else {
            $ayah = Ayah::with(['surah', 'edition'])->Published()->findOrFail(request()->ayah);
        }


        if (request()->ajax()) {
            $posts = Post::PublishedPost($ayah->posts->published_date)->with('ayah')->orderBy('ayah_id', 'ASC')->get();

            foreach ($posts as $post) {
                $post->tafsir = Ayah::where(['surah_id' => $ayah->surah_id, 'order_in_surah' => $post->ayah->order_in_surah])->Tafsir(request()->edition)->get()->first()->text ?? '';
            }
            return view('frontend.content.rows', compact('posts'));
        }

        $range = ['start' => explode('-', $ayah->posts->start_end)[0], 'end' => explode('-', $ayah->posts->start_end)[1]];
        $surah = $ayah->surah;
        $editions = Edition::where('edition_type_id', getEditionType('tafsir'))->get();

        return view('frontend.content.show', compact('editions', 'surah', 'range'));
    }

    public function changeTheme()
    {
        if (session()->get('theme') == 'dark') {
            session(['theme' => 'white']);
        } else {
            session(['theme' => 'dark']);
        }
        return back();
    }

    public function radio()
    {
        $radioApiUrl = "https://api.mp3quran.net/radios/radio_arabic.json";
        $radios  = $this->getLiveRadioStations($radioApiUrl) ;

        // guzzle not working according ssl
        // $res  = Http::get('https://api.mp3quran.net/radios/radio_arabic.json')::withOptions(["verify"=>false]);
        // $radios = $res->json()['radios'];
        return view('frontend.radio.index', compact('radios'));
    }

    public function azkars(Request $request)
    {
        if (request()->ajax()) {
            $azkars = Category::when(request()->search, function ($query) {
                return $query->where('title', 'like', '%'.request()->search.'%');
            })->whereHas('azkars')->get();
            return view('frontend.azkars.rows', compact('azkars'));
        }
        return view('frontend.azkars.index');
    }

    public function getAzkars(Request $request, $id)
    {
        $category = Category::withCount('azkars')->findOrFail($id);
        $azkars   = Azkar::where('category_id', $id)->get();
        return view('frontend.azkars.show', compact('azkars', 'category'));
    }


    public function getLiveRadioStations($URL)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => $URL,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_SSL_VERIFYHOST=> false ,
        CURLOPT_SSL_VERIFYPEER => false ,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        $res   =  json_decode($response,true) ;
        return $radios = $res['radios'];
    }

}
