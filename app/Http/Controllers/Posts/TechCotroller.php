<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\SiteVisitController;
use App\Models\Posts\Posts;
use App\Models\Articles\Categories;


class TechCotroller extends Controller
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
            'site' => "tech",
        ]);

        $siteVisit = new SiteVisitController();
        $siteVisit->store($request);


        $techdata['posts'] = null;
        $categories = Categories::where('category', 'LIKE', '%' . 'tech%')
            ->with('posts.postable')
            ->get();

        if (count($categories)) {
            foreach ($categories as $category) {
                $posts = Posts::where('post_category', $category->id)
                    ->inRandomOrder()
                    ->with('postable')
                    ->orderBy('created_at', 'DESC')
                    ->simplePaginate(20);

                foreach ($posts as $post) {
                    $post->post_top_image = json_decode($post->post_top_image);
                }
                $techdata['posts'] = $posts;
            }
        } else {
            $posts = Posts::inRandomOrder()
                ->with('postable')
                ->simplePaginate(20);
            foreach ($posts as $post) {
                $post->post_top_image = json_decode($post->post_top_image);
            }
            $techdata['posts'] = $posts;
        }

        $recomended = Posts::inRandomOrder()
            ->with('postable')
            ->simplePaginate(7);
        $techdata['recomended'] = $recomended;

        foreach ($recomended as $post) {
            $post->post_top_image = json_decode($post->post_top_image);
        }
        return view('post.tech', compact('techdata'));
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
