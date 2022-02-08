<?php

namespace App\Http\Controllers\Quran;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\AzkarsDataTable;
use App\Models\Category;
use App\Http\Requests\AzkarRequest;
use App\Models\Azkar;

class AzkarController extends Controller
{
    public function index(AzkarsDataTable $dataTable)
    {
        return $dataTable->render('azkars.index');
    }

    public function create()
    {
        $categories = Category::when(request()->category, function ($query) {
            return $query->where('id', request()->category);
        })->pluck('title', 'id')->toArray();
        return view('azkars.form', compact('categories'));
    }

    public function store (AzkarRequest $request)
    {
        Azkar::create($request->except('id'));
        return redirect('azkars')->with('success', ' Zekr Created Successfully');
    }

    public function edit($id)
    {
        $categories = Category::pluck('title', 'id')->toArray();
        $zekr = Azkar::findOrFail($id);
        return view('azkars.form', compact('zekr', 'categories'));
    }

    public function update(AzkarRequest $request, $id)
    {
        $azkar = Azkar::findOrFail($id);
        $azkar->update($request->all());
        return redirect('azkars')->with('success', ' Zekr Updated Successfully');
    }

    public function destroy($id)
    {
        Azkar::findOrFail($id)->delete();
        return redirect('azkars')->with('success', ' Zekr Deleted Successfully');
    }

    public function multiDelete(Request $request)
    {
        if ($request->ids == "")
            return redirect('azkars')->with('success', 'Please select some rows!');

        $ids_array = explode(',', $request->ids);
        if (is_array($ids_array) && count($ids_array) > 0) {
            Azkar::whereIn('id', $ids_array)->delete();
            return redirect('azkars')->with('success', 'This azkars ['.count($ids_array).'] Deleted Successfully');
        }
        return redirect('azkars')->with('success', 'Something is wrong!');
    }
}
