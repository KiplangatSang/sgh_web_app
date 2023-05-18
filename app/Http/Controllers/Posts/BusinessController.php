<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Http\Controllers\SiteVisitController;
use App\Models\Articles\Categories;
use App\Models\Posts\Posts;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $request = new Request([
            'site' => 'business',
        ]);

        $siteVisit = new SiteVisitController();
        $siteVisit->store($request);
        $businessdata['posts'] = null;

        $categories = Categories::where('category', 'LIKE', '%' . 'Business%')
            ->with('posts.postable')
            ->get();
        if (count($categories)) {
            foreach ($categories as $category) {
                $posts = Posts::where('post_category', $category->id)
                    ->inRandomOrder()
                    ->with('postable')
                    ->where("post_publish_status", true)
                    ->where("is_suspended", false)
                    ->where("status", true)
                    ->simplePaginate(config('app.posts_pagination'));

                foreach ($posts as $post) {
                    $post->post_top_image = json_decode($post->post_top_image);
                }
                $businessdata['posts'] = $posts;
            }
        } else {
            $posts = Posts::inRandomOrder()
                ->with('postable')
                ->where("post_publish_status", true)
                ->where("is_suspended", false)
                ->where("status", true)
                ->simplePaginate(config('app.posts_pagination'));
            foreach ($posts as $post) {
                $post->post_top_image = json_decode($post->post_top_image);
            }
            $businessdata['posts']  = $posts;
        }



        $recomended = Posts::inRandomOrder()
            ->with('postable')
            ->where("post_publish_status", true)
            ->where("is_suspended", false)
            ->where("status", true)
            ->simplePaginate(config('app.recommended_pagination'));
        $businessdata['recomended'] = $recomended;
        foreach ($recomended as $post) {
            $post->post_top_image = json_decode($post->post_top_image);
        }
        return view('post.business', compact('businessdata'));
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
