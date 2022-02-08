<?php

namespace App\Http\Controllers\Quran;

use App\DataTables\AudiosDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\AudioRequest;
use App\Models\Audio;
use App\Models\Ayah;
use Illuminate\Http\Request;

class AudioController extends Controller
{
    public function index(AudiosDataTable $dataTable)
    {
        request()->ayah ? session(['ayah' => request()->ayah]) : '';
        return $dataTable->render('audios.index');
    }

    public function edit($id)
    {
        $audio = Audio::findOrFail($id);
        return view('audios.edit', compact('audio'));
    }

    public function update(AudioRequest $request, $id)
    {
        $audio = Audio::findOrFail($id);
        $src = $audio->src;
        if($request->has('src')) {
            $this->removeSrc($audio->src);
            $src = $this->moveAudio ($request, $audio->ayah->edition->identifier);
        }
        $audio->update([
            'src'             => $src,
            'quality'         => $request->quality,
            'default_audio'   => $request->default_audio ?? 0
        ]);
        if ( $request->default_audio == 1)
            Audio::where(['ayah_id' => $audio->ayah_id, 'default_audio' => 1])->update(['default_audio' => 0]);

        $url = session('ayah') ? '?ayah='.session('ayah') : '';
        session()->forget('ayah');

        return redirect('/audios'.$url);
    }

    public function destroy($id)
    {
        $audio = Audio::findOrFail($id);
        $this->removeSrc($audio->src);

        if ( $audio->default_audio == 1)
            Audio::where(['ayah_id' => $audio->ayah_id, 'default_audio' => 0])->first()->update(['default_audio' => 1]);

        $audio->delete();
        return redirect('audios')->with('success', ' Audio Deleted Successfully');
    }

    public function multiDelete(Request $request)
    {
        if ($request->ids == "")
            return redirect('audios')->with('success', 'Something is wrong!');

        $ids_array = explode(',', $request->ids);
        if (is_array($ids_array) && count($ids_array) > 0) {
            $audios = Audio::whereIn('id', $ids_array)->get();
            foreach ($audios as $audio) {
                $this->removeSrc($audio->src);
                $audio->delete();
            }
            return redirect('audios')->with('success', 'This Audios ['.count($ids_array).'] Deleted Successfully');
        }
        return redirect('audios')->with('success', 'Something is wrong!');
    }

    public function removeSrc($src)
    {
        if (file_exists($src)) {
            unlink($src);
            return true;
        }
        return false;
    }

    protected function moveAudio ($request, $identifier)
    {
        $extension = $request->src->extension();
        $name = intval(microtime(true)).'.'.$extension;
        $path = 'uploads/quran/audio/'.$request->quality.'/'.$identifier.'/';
        $request->src->move($path, $name);

        return $path . $name;
    }
}
