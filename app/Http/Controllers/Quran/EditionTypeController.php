<?php

namespace App\Http\Controllers\quran;

use App\DataTables\EditionTypesDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\EditionTypeRequest;
use App\Models\EditionType;
use Illuminate\Http\Request;

class EditionTypeController extends Controller
{
    public function index(EditionTypesDataTable $dataTable)
    {
        return $dataTable->render('edition-types.index');
    }

    public function create()
    {
        return view('edition-types.create');
    }

    public function store(EditionTypeRequest $request)
    {
        EditionType::create($request->validated());
        return redirect('edition-types')->with('success', 'Edition Type Created Successfully');
    }

    public function edit($id)
    {
        $edition_type = EditionType::findOrFail($id);
        return view('edition-types.edit', compact('edition_type'));
    }

    public function update(EditionTypeRequest $request, $id)
    {
        EditionType::findOrFail($id)->update($request->validated());
        return redirect('edition-types')->with('success', 'Edition Type Updated Successfully');
    }

    public function destroy($id)
    {
        EditionType::findOrFail($id)->delete();
        return redirect('edition-types')->with('success', 'Edition Type Deleted Successfully');
    }

    public function multiDelete(Request $request)
    {
        if ($request->ids == "")
            return redirect('edition-types')->with('success', 'Something is wrong!');

        $ids_array = explode(',', $request->ids);
        if (is_array($ids_array) && count($ids_array) > 0) {
            EditionType::whereIn('id', $ids_array)->delete();
            return redirect('edition-types')->with('success', 'This Edition Types ['.count($ids_array).'] Deleted Successfully');
        }
        return redirect('edition-types')->with('success', 'Something is wrong!');
    }
}
