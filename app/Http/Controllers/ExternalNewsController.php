<?php

namespace App\Http\Controllers;

use App\Http\APIPosts\FetchNewsContract;
use App\Http\Repositories\ExternalAPIRepository;
use App\Models\ExternalPostsAPI;
use App\Models\User;
use DateTime;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ExternalNewsController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        //

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(FetchNewsContract $fetchNewsContract)
    {
        //
        $externalAPIRepository = new ExternalAPIRepository();

        //fetch sports news
        foreach(ExternalPostsAPI::ESPNSoccerparameters as  $param){
            $news = $externalAPIRepository->fetchNews($fetchNewsContract, $param, null);
            $this->store($news);
        }


        return true;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //


        $user = User::where('email', env('ADMIN_EMAIL'))->first();

        $result =   $user->posts()->updateOrCreate(
            ["post_title" => $request->post_title,],
            $request->except('post_title'),
        );

        if (!$result) {
            info("Errors detected in storing the data");
            return back()->with('error', "could not store the data");
        }

        return $result;
    }


    /**
     * Display the specified resource.
     */
    public function show(FetchNewsContract $fetchNewsContract, $id)
    {

        //FetchNewsContract $fetchNewsContract, string $id

        $params = "eng.2";
        //$espngateway = new ESPNGateway($params);
        $news = $fetchNewsContract->fetchItem($params);
        return  $news;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
