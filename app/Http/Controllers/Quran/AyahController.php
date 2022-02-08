<?php

namespace App\Http\Controllers\Quran;

use App\DataTables\AyahsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\AyahRequest;
use App\Models\Audio;
use App\Models\Ayah;
use App\Models\Edition;
use App\Models\Surah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AyahController extends Controller
{
    protected function getPrams ()
    {
        if (request()->edition &&  request()->surah) {
            session(['url' => ['surah' => request()->surah, 'edition' => request()->edition, 'url' => '?edition='.request()->edition.'&surah='.request()->surah]]);
        } else if (request()->edition) {
            session(['url' => ['surah' => null, 'edition' => request()->edition, 'url' => '?edition='.request()->edition]]);
        } else if (request()->surah) {
            session(['url' => ['surah' => request()->surah, 'edition' => null, 'url' => '?surah='.request()->surah]]);
        }
        return session('url') ?? '';
    }

    public function index(AyahsDataTable $dataTable)
    {
        if (request()->edition ||  request()->surah) {
            $this->getPrams();
        } else {
            session()->forget('url');
        }

        return $dataTable->render('ayahs.index');
    }

    public function create()
    {
        $this->getPrams();
        $surahs = Surah::when(session('url')['surah'], function ($query) {
            return $query->where('id', session('url')['surah']);
        })->orderBy('id', 'ASC')->pluck('name', 'id')->toArray();

        $editions = Edition::when(session('url')['edition'], function ($query) {
            return $query->where('id', session('url')['edition']);
        })->pluck('identifier', 'id')->toArray();

        return view('ayahs.create', compact('surahs', 'editions'));
    }

    public function store (AyahRequest $request)
    {
        $image = $request->has('image') ? $this->moveImage($request->image) : null;
        $ayah = Ayah::create($request->except('image')+['image' => $image]);

        if ($request->has('audios') && count($request->audios) > 0) {
            foreach ($request->audios as $audio) {
                $this->createAudio ($audio, $ayah);
            }
        }

        $url = session('url')['url'] ?? '';
        session()->forget('url');
        return redirect('/ayahs'.$url)->with('success', ' Ayah Created Successfully');
    }

    public function edit($id)
    {
        $this->getPrams();

        $surahs = Surah::when(session('url')['surah'], function ($query) {
            return $query->where('id', session('url')['surah']);
        })->orderBy('id', 'ASC')->pluck('name', 'id')->toArray();

        $editions = Edition::when(session('url')['edition'], function ($query) {
            return $query->where('id', session('url')['edition']);
        })->pluck('identifier', 'id')->toArray();

        $ayah = Ayah::with('audios')->findOrFail($id);
        return view('ayahs.edit', compact('ayah', 'surahs', 'editions'));
    }

    public function update(AyahRequest $request, $id)
    {
        $ayah = Ayah::findOrFail($id);
        if( $request->has('image') ) {
            $image =  $this->moveImage($request->image, $ayah);
        } else {
            $image =  $ayah->image;
        }

        $ayah->update($request->except('image')+['image' => $image]);

        if ($request->has('audios') && count($request->audios) > 0) {
            foreach ($request->audios as $audio) {
                if (isset($audio['id']) && $audio['id'] != null) {
                    $old_audio = Audio::findOrFail($audio['id']);
                    if (isset($audio['src'])) { //  upload new track audio
                        if (File::exists($old_audio->src))
                            unlink($old_audio->src);

                        $old_audio->update([
                            'src'             => $this->moveAudio ($audio, $ayah),
                            'quality'         => $audio['quality'],
                            'default_audio'   => $audio['default_audio'] ?? 0
                        ]);
                    } else { // not upload audio
                        $old_audio->update(['quality' => $audio['quality'], 'default_audio' => $audio['default_audio'] ?? 0]);
                    }
                } else { // new upload audio
                    $new = $this->createAudio ($audio, $ayah);
                }
            }
        }

        $url = session('url')['url'] ?? '';
        session()->forget('url');
        return redirect('/ayahs'.$url)->with('success', ' Ayah Updated Successfully');
    }

    protected function moveAudio ($audio, $ayah)
    {
        $name = $ayah->number.'.'.$audio['src']->extension();
        $path = 'uploads/quran/audio/'.$audio['quality'].'/'.$ayah->edition->identifier.'/';
        if (!File::exists($path))
            File::makeDirectory($path, 0777, true);

        $audio['src']->move($path, $name);
        return $path . $name;
    }

    protected function moveImage ($image)
    {
        $name = uniqid().time().'.'.$image->extension();
        $path = 'uploads/quran/images/';
        if (!File::exists($path))
            File::makeDirectory($path, 0777, true);

        $image->move($path, $name);
        return $path . $name;
    }

    protected function createAudio ($audio, $ayah)
    {
        $new = Audio::create([
            'src'           => $this->moveAudio ($audio, $ayah),
            'quality'       => $audio['quality'],
            'default_audio' => $audio['default_audio'] ?? 0,
            'ayah_id'       => $ayah->id,
        ]);

        return $new;
    }

    public function destroy($id)
    {
        $url = $this->getPrams()['url'];
        session()->forget('url');
        Ayah::findOrFail($id)->delete();
        return redirect('/ayahs'.$url)->with('success', ' Ayah Deleted Successfully');
    }

    public function removeAudio($id)
    {
        $audio = Audio::findOrFail($id);
        if (File::exists($audio->src))
            unlink($audio->src);

        if ($audio->delete())
            return true;
    }

    public function multiDelete(Request $request)
    {
        $url = $this->getPrams()['url'];
        session()->forget('url');
        if ($request->ids == "")
            return redirect('/ayahs'.$url)->with('success', 'Something is wrong!');

        $ids_array = explode(',', $request->ids);
        if (is_array($ids_array) && count($ids_array) > 0) {
            Ayah::whereIn('id', $ids_array)->delete();
            return redirect('/ayahs'.$url)->with('success', 'This Ayahs ['.count($ids_array).'] Deleted Successfully');
        }
        return redirect('/ayahs'.$url)->with('success', 'Something is wrong!');
    }
}
