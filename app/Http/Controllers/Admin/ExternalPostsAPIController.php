<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ExternalPostsAPI;
use App\Http\Requests\StoreExternalPostsAPIRequest;
use App\Http\Requests\UpdateExternalPostsAPIRequest;
use Illuminate\Http\Request;


class ExternalPostsAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $apis =  ExternalPostsAPI::latest()->get();

        return view('admin.apis.index', compact('apis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('admin.apis.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExternalPostsAPIRequest $request)
    {
        //

        $result =   $request->user()->apis()->create(
            $request->validated(),
        );

        if (!$result)
            return back()->with('error', "API could not be stored");

        return redirect(route('admin.apis.index'))->with('success', "API updated successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(ExternalPostsAPI $externalPostsAPI, $api)
    {
        //


        //$externalPostsAPI->where('id', $api)->first();
        $api =  $externalPostsAPI->where('id', $api)->first();
        return view('admin.apis.show', compact('api'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ExternalPostsAPI $externalPostsAPI, $api)
    {
        //
        $api = $externalPostsAPI->where('id', $api)->first();
        return view('admin.apis.edit', compact('api'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExternalPostsAPIRequest $request, ExternalPostsAPI $externalPostsAPI, $api)
    {
        //

        $this->authorize('update', $externalPostsAPI);

        $api =  $externalPostsAPI->where('id', $api)->first();

        $result = $api->update(
            $request->validated(),
        );
        if (!$result)
            return back()->with('error', "API could not be up updated");
        return redirect(route('admin.apis.index'))->with('success', "API updated successfully");
    }

    public function updateAdminCommands($api, Request $request,ExternalPostsAPI $externalPostsAPI)
    {
        //

        // dd($api);
          $this->authorize('update', $externalPostsAPI);
        $request->only(
            [
                "is_callable",
                "status",
                "is_suspended",
            ]
        );

        $request->validate([
            'is_callable' => 'in:1,0',
            'status' => 'in:1,0',
            'is_suspended' => 'in:1,0',

        ]);

        $api =  ExternalPostsAPI::where('id', $api)->first();

        $result = $api->update(
            $request->all(),
        );
        if (!$result)
            return back()->with('error', "API could not be up qdated");
        return redirect(route('admin.apis.index'))->with('success', "API updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExternalPostsAPI $externalPostsAPI, $api)
    {
        //

        $result =     $externalPostsAPI->destroy($api);

        if (!$result)
            return back()->with('error', "API could not be deleted");


        return redirect(route('admin.apis.index'))->with('success', "API deleted successfully");
    }
}
