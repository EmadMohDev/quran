<?php

namespace App\Http\Controllers\Quran;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriesRequest;
use App\DataTables\CategoriesDataTable;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(CategoriesDataTable $dataTable)
    {
        return $dataTable->render('categories.index');
    }

    public function create()
    {
        return view('categories.form');
    }

    public function store(CategoriesRequest $request)
    {
        Category::create(['title' => $request->title]);
        return redirect('categories');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.form', compact('category'));
    }

    public function update($id, CategoriesRequest $request)
    {
        $category = Category::findOrFail($id);
        $category->update(['title' => $request->title]);
        return redirect('categories');
    }

    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        return redirect('categories')->with('success', 'Category Deleted Successfully');
    }

    public function multiDelete(Request $request)
    {
        if ($request->ids == "")
            return redirect('categories')->with('success', 'Please select some rows!');

        $ids_array = explode(',', $request->ids);
        if (is_array($ids_array) && count($ids_array) > 0) {
            Category::whereIn('id', $ids_array)->delete();
            return redirect('categories')->with('success', 'This categories ['.count($ids_array).'] Deleted Successfully');
        }
        return redirect('categories')->with('success', 'Something is wrong!');
    }

    public function toggleFeature()
    {
        $category = Category::findOrFail(request()->id);
        if (! $category->update(['feature' => ! $category->feature]))
            return response()->json(['message' => 'something is wrong!'], 500);

        return true;
    }
}
