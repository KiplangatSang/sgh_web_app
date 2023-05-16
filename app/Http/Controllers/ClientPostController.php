<?php

namespace App\Http\Controllers;

use App\Models\Posts\Posts;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ClientPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return view('post.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($post_id)
    {
        $postdata['post']= Posts::where('post_id', $post_id)->first();
        $newposts = Posts::orderBy('created_at', 'DESC')->simplePaginate(10);

        foreach ($newposts as $post) {
            if($post->post_top_image )
            $post->post_top_image = json_decode($post->post_top_image);
            else
            $post->post_top_image = null;


        }
        $postdata['newposts'] = $newposts;
        $post_top_image = array();
        if ($post_top_image) {
        }


        return view('post.post', compact('postdata'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}