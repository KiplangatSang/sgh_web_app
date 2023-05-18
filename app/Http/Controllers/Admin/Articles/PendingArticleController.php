<?php

namespace App\Http\Controllers\Admin\Articles;

use App\Http\Controllers\Controller;
use App\Models\Posts\Posts;
use Illuminate\Http\Request;

class PendingArticleController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $user = User::whereIn('id',auth()->user())->first();

        $posts = Posts::orderBy('created_at', 'DESC')
            ->where("post_publish_status", false)
            ->orWhere("is_suspended", true)
            ->orWhere("status", false)
            ->simplePaginate(config('app.posts_pagination'));

        $postdata = array();
        $postdata['posts'] = $posts;

        return view('admin.articles.index', compact('postdata'));
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
    public function show($id)
    {
        //
        $post = Posts::where('id', $id)->first();
        $postdata = array();
        return view('admin.articles.show', compact('post'));
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
        $post = Posts::where('id', $id)->first();

        $result =  $post->update(
            $request->all(),
        );

        if (!$result)
            return back()->with('error', "The post article could not be updated");

        return back()->with('success', "The post article has updated successfully");
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
