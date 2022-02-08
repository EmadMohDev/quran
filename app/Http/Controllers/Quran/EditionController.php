<?php

namespace App\Http\Controllers\Quran;

use App\DataTables\EditionsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\EditionRequest;
use App\Models\Edition;
use App\Models\EditionLang;
use App\Models\EditionType;
use App\Models\Format;
use App\Models\Provider;
use Illuminate\Http\Request;

class EditionController extends Controller
{
    public function index(EditionsDataTable $dataTable)
    {
        request()->provider ? session(['provider' => ['id' => request()->provider, 'url' => '?provider='.request()->provider]]) : '';
        return $dataTable->render('editions.index');
    }

    public function create()
    {
        request()->provider ? session(['provider' => ['id' => request()->provider, 'url' => '?provider='.request()->provider]]) : '';
        $url = session()->has('provider') ? session('provider')['url'] : '';
        $langs      = EditionLang::pluck('name', 'id')->toArray();
        $types      = EditionType::pluck('title', 'id')->toArray();
        $formats    = Format::pluck('title', 'id')->toArray();
        $providers  = Provider::when(request()->provider ?? session('provider')['id'], function ($query) {
            return $query->where('id', request()->provider ?? session('provider')['id']);
        })->pluck('name', 'id')->toArray();
        return view('editions.create', compact('langs', 'types', 'formats', 'providers'));
    }

    public function store(EditionRequest $request)
    {
        $url = session()->has('provider') ? session('provider')['url'] : '';
        session()->forget('provider');
        Edition::create($request->validated());
        return redirect('/editions' .$url)->with('success', ' Edition Created Successfully');
    }

    public function edit($id)
    {
        $edition = Edition::findOrFail($id);
        request()->provider ? session(['provider' => ['id' => request()->provider, 'url' => '?provider='.request()->provider]]) : '';
        $langs      = EditionLang::pluck('name', 'id')->toArray();
        $types      = EditionType::pluck('title', 'id')->toArray();
        $formats    = Format::pluck('title', 'id')->toArray();
        $providers  = Provider::when(request()->provider ?? session('provider')['id'], function ($query) {
            return $query->where('id', request()->provider ?? session('provider')['id']);
        })->pluck('name', 'id')->toArray();
        return view('editions.edit', compact('edition', 'langs', 'types', 'formats', 'providers'));
    }

    public function update(EditionRequest $request, $id)
    {
        $url = session()->has('provider') ? session('provider')['url'] : '';
        session()->forget('provider');
        Edition::findOrFail($id)->update($request->validated());
        return redirect('/editions'.$url)->with('success', ' Edition Updated Successfully');
    }

    public function destroy($id)
    {
        $url = session()->has('provider') ? session('provider')['url'] : '';
        session()->forget('provider');
        Edition::findOrFail($id)->delete();
        return redirect('/editions'.$url)->with('success', ' Edition Deleted Successfully');
    }

    public function multiDelete(Request $request)
    {
        $url = session()->has('provider') ? session('provider')['url'] : '';
        session()->forget('provider');
        if ($request->ids == "")
            return redirect('/editions'.$url)->with('success', 'Something is wrong!');

        $ids_array = explode(',', $request->ids);
        if (is_array($ids_array) && count($ids_array) > 0) {
            Edition::whereIn('id', $ids_array)->delete();
            return redirect('/editions'.$url)->with('success', 'This Editions ['.count($ids_array).'] Deleted Successfully');
        }
        return redirect('/editions'.$url)->with('success', 'Something is wrong!');
    }
}
