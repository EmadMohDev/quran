<?php

namespace App\Http\Controllers;

use App\Jobs\InsertAyahs;
use App\Jobs\InsertAzkars;
use App\Jobs\InsertEditionProvider;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\Edition;
use App\Models\EditionLang;
use App\Models\EditionType;
use App\Models\Format;
use App\Models\Surah;

class getApiDataController extends Controller
{
    public $URL = 'http://api.alquran.cloud/v1/';

    public function langs()
    {
        $res  = Http::get($this->URL.'edition/language');
        $langs = $res->json()['data'];
        $count = 0;
        foreach ($langs as $lang) {
            $check = EditionLang::updateOrCreate(['name' => $lang], ['name' => $lang]);
            if($check)
                $count++;
        }
        return back()->with('success', 'data inserted successfully! ( ' . $count . ' ) | ( ' . (count($langs) - $count) . ' )');
    }

    public function formats()
    {
        $res  = Http::get($this->URL.'edition/format');
        $formats = $res->json()['data'];
        $count = 0;
        foreach ($formats as $format) {
            $check = Format::updateOrCreate(['title' => $format],['title' => $format]);
            if($check)
                $count++;
        }
        return back()->with('success', 'data inserted successfully! ( ' . $count . ' ) | ( ' . (count($formats) - $count) . ' )');
    }

    public function types()
    {
        $res  = Http::get($this->URL.'edition/type');
        $types = $res->json()['data'];
        $count = 0;
        foreach ($types as $type) {
            $check = EditionType::updateOrCreate(['title' => $type], ['title' => $type]);
            if($check)
                $count++;
        }
        return back()->with('success', 'data inserted successfully! ( ' . $count . ' ) | ( ' . (count($types) - $count) . ' )');
    }

    public function providersEditions()
    {
        dispatch(new InsertEditionProvider($this->URL));
        return redirect()->back()->with('success', 'All Editions will be inserted in the background!');
    }

    public function surahs()
    {
        $res  = Http::get($this->URL.'quran/quran-uthmani');
        $surahs = $res->json()['data']['surahs'];
        $count = 0;

        foreach ($surahs as $surah) {
            $new_surah = Surah::updateOrCreate([
                'number'                => $surah['number'],
                'name'                  => $surah['name'],
                'name_en'               => $surah['englishName'],
            ],[
                'number'                => $surah['number'],
                'name'                  => $surah['name'],
                'name_en'               => $surah['englishName'],
                'translation_name_en'   => $surah['englishNameTranslation'],
                'count_of_ayahs'        => count($surah['ayahs']),
                'surah_type'            => $surah['revelationType'] == 'Meccan' ? 1 : 0,
            ]);
            if($new_surah)
                $count++;
        }
        return back()->with('success', 'data inserted successfully! ( ' . $count . ' ) | ( ' . (count($surahs) - $count) . ' )');
    }

    public function editionsForm()
    {
        $except_editions = session()->get('editions') ?? [];
        $editions = Edition::whereNotIn('identifier', $except_editions)->orWhereDoesntHave('ayahs')->get();
        return view('download.edition', compact('editions'));
    }

    public function ayahs(Request $request)
    {
        $editions = Edition::when($request->edition, function ($query) use ($request) {
            return $query->where('identifier', $request->edition);
        })->whereNotIn('identifier', session()->get('editions') ?? [])->get();

        $allSurahs = Surah::pluck('id', 'name');

        foreach ($editions as $edition) {
            dispatch(new InsertAyahs($edition, $this->URL, $allSurahs));
            if (session()->has('editions')) {
                session()->push('editions', $edition->identifier);
            } else {
                session()->put('editions', [$edition->identifier]);
            }
        }
        return redirect()->back()->with('success', 'All ayahs will be inserted in the background!');
    }

    public function azkars(Request $request)
    {
        dispatch(new InsertAzkars('https://raw.githubusercontent.com/osamayy/azkar-db/master/azkar.json'));
        return redirect()->back()->with('success', 'All Azkars will be inserted in the background!');
    }
}
