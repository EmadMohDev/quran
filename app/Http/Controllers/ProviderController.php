<?php

namespace App\Http\Controllers;

use App\DataTables\ProvidersDataTable;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Repository\LanguageRepository;
use App\Http\Requests\ProviderRequest;
use App\Models\Provider;
use Validator;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(LanguageRepository $languageRepository)
    {
        $this->get_privilege();
        // $this->languageRepository    = $languageRepository;
    }

    public function index(ProvidersDataTable $dataTable)
    {
        $url = explode('/', request()->route()->uri);
        $title = 'Providers';
        if (in_array ('feature', $url))
            $title = 'Feature';
        else if (in_array ('home-providers-section', $url))
            $title = 'Home Providers Section';
        else if (in_array ('home-editions-section', $url))
            $title = 'Home Editions Section';

        return $dataTable->render('provider.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('provider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProviderRequest $request)
    {
        Provider::create($request->validated());
        \Session::flash('success', trans('messages.has been created successfully'));
        return redirect('/provider');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $provider = Provider::findOrFail($id);
        return view('category.index', compact('provider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $provider = Provider::findOrFail($id);
        return view('provider.edit', compact('provider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProviderRequest $request, $id)
    {
        $provider = Provider::findOrFail($id);
        $provider->update($request->validated());

        \Session::flash('success', trans('messages.updated successfully'));
        return redirect('/provider');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $provider = Provider::find($id);
        $provider->delete();
        return redirect('/provider')->with('success', 'This Provider Deleted Successfully');
    }

    public function multiDelete(Request $request)
    {
        if ($request->ids == "")
            return redirect('/provider')->with('success', 'Something is wrong!');

        $ids_array = explode(',', $request->ids);
        if (is_array($ids_array) && count($ids_array) > 0) {
            Provider::whereIn('id', $ids_array)->delete();
            return redirect('/provider')->with('success', 'This Providers ['.$request->ids.'] Deleted Successfully');
        }
        return redirect('/provider')->with('success', 'Something is wrong!');
    }

    public function toggleFeature()
    {
        $provider = Provider::findOrFail(request()->id);
        if (! $provider->update(['feature' => ! $provider->feature]))
            return response()->json(['message' => 'something is wrong!'], 500);

        return true;
    }

    public function toggleHomeProviderSection()
    {
        $provider = Provider::findOrFail(request()->id);
        if (! $provider->update(['home_provider_section' => ! $provider->home_provider_section]))
            return response()->json(['message' => 'something is wrong!'], 500);

        return true;
    }

    public function toggleHomeEditionSection()
    {
        $provider = Provider::findOrFail(request()->id);
        if (! $provider->update(['home_edition_section' => ! $provider->home_edition_section]))
            return response()->json(['message' => 'something is wrong!'], 500);

        return true;
    }

    public function toggleActive()
    {
        $provider = Provider::findOrFail(request()->id);
        if ($provider->update(['is_active' => ! $provider->is_active])) {
            if ($provider->is_active)
                return '<span class="badge badge-success">Active</span>';
            return '<span class="badge badge-danger">Disable</span>';
        } else {
            return response()->json(['message' => 'something is wrong!'], 500);
        }
    }
}
