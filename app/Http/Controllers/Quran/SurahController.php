<?php

namespace App\Http\Controllers\Quran;

use App\DataTables\SurahsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\SurahRequest;
use App\Models\Surah;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SurahController extends Controller
{
    public function index(SurahsDataTable $dataTable)
    {
        request()->edition ? session(['edition' => request()->edition]) : '';
        return $dataTable->render('surahs.index');
    }

    public function create()
    {
        return view('surahs.create');
    }

    public function store(SurahRequest $request)
    {
        Surah::create($request->validated());
        return redirect('surahs')->with('success', 'Surah Created Successfully');
    }

    public function edit($id)
    {
        $surah = Surah::findOrFail($id);
        return view('surahs.edit', compact('surah'));
    }


    public function update(SurahRequest $request, $id)
    {
        Surah::findOrFail($id)->update($request->validated());
        return redirect('surahs')->with('success', 'Surah Updated Successfully');
    }

    public function destroy($id)
    {
        Surah::findOrFail($id)->delete();
        return redirect('surahs')->with('success', 'Surah Deleted Successfully');
    }

    public function multiDelete(Request $request)
    {
        if ($request->ids == "")
            return redirect('surahs')->with('success', 'Something is wrong!');

        $ids_array = explode(',', $request->ids);
        if (is_array($ids_array) && count($ids_array) > 0) {
            Surah::whereIn('id', $ids_array)->delete();
            return redirect('surahs')->with('success', 'This Surahs ['.count($ids_array).'] Deleted Successfully');
        }
        return redirect('surahs')->with('success', 'Something is wrong!');
    }
}
