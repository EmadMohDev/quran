<?php

namespace App\Http\Controllers\quran;

use App\DataTables\FormatsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\FormatRequest;
use App\Models\Format;
use Illuminate\Http\Request;

class FormatController extends Controller
{
    public function index(FormatsDataTable $dataTable)
    {
        return $dataTable->render('formats.index');
    }

    public function create()
    {
        return view('formats.create');
    }

    public function store(FormatRequest $request)
    {
        Format::create($request->validated());
        return redirect('formats')->with('success', 'Format Created Successfully');
    }

    public function edit($id)
    {
        $format = Format::findOrFail($id);
        return view('formats.edit', compact('format'));
    }

    public function update(FormatRequest $request, $id)
    {
        Format::findOrFail($id)->update($request->validated());
        return redirect('formats')->with('success', 'Format Updated Successfully');
    }

    public function destroy($id)
    {
        Format::findOrFail($id)->delete();
        return redirect('formats')->with('success', 'Format Deleted Successfully');
    }

    public function multiDelete(Request $request)
    {
        if ($request->ids == "")
            return redirect('formats')->with('success', 'Something is wrong!');

        $ids_array = explode(',', $request->ids);
        if (is_array($ids_array) && count($ids_array) > 0) {
            Format::whereIn('id', $ids_array)->delete();
            return redirect('formats')->with('success', 'This formats ['.count($ids_array).'] Deleted Successfully');
        }
        return redirect('formats')->with('success', 'Something is wrong!');
    }
}
