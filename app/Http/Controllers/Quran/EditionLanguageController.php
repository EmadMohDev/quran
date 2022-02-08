<?php

namespace App\Http\Controllers\quran;

use App\DataTables\EditionLanguagesDataTable;
use App\DataTables\EditionTypesDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\EditionLanguageRequest;
use App\Http\Requests\EditionTypeRequest;
use App\Models\EditionLang;
use Illuminate\Http\Request;

class EditionLanguageController extends Controller
{
    public function index(EditionLanguagesDataTable $dataTable)
    {
        return $dataTable->render('edition-languages.index');
    }

    public function create()
    {
        return view('edition-languages.create');
    }

    public function store(EditionLanguageRequest $request)
    {
        EditionLang::create($request->validated());
        return redirect('edition-languages')->with('success', ' Edition Language Created Successfully');
    }

    public function edit($id)
    {
        $edition_language = EditionLang::findOrFail($id);
        return view('edition-languages.edit', compact('edition_language'));
    }

    public function update(EditionLanguageRequest $request, $id)
    {
        $edition_language = EditionLang::findOrFail($id)->update($request->validated());
        return redirect('edition-languages')->with('success', ' Edition Language Updated Successfully');
    }

    public function destroy($id)
    {
        EditionLang::findOrFail($id)->delete();
        return redirect('edition-languages')->with('success', ' Edition Language Deleted Successfully');
    }

    public function multiDelete(Request $request)
    {
        if ($request->ids == "")
            return redirect('edition-languages')->with('success', 'Something is wrong!');

        $ids_array = explode(',', $request->ids);
        if (is_array($ids_array) && count($ids_array) > 0) {
            EditionLang::whereIn('id', $ids_array)->delete();
            return redirect('edition-languages')->with('success', 'This Edition Languages ['.count($ids_array).'] Deleted Successfully');
        }
        return redirect('edition-languages')->with('success', 'Something is wrong!');
    }
}
