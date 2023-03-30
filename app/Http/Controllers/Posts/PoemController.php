<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\SiteVisitController;
use App\Models\Posts\Posts;
use App\Models\Articles\Categories;


class PoemController extends Controller
{
    //
    public function index()
    {
        //
        $request = new Request([
            'site' => "poems",
        ]);

        $siteVisit = new SiteVisitController();
        $siteVisit->store($request);

        $poemdata['posts'] = null;

        $categories = Categories::where('category', 'LIKE', '%' . 'Poems%')
            ->with('posts.postable')
            ->get();
        if (count($categories)) {
            foreach ($categories as $category) {
                $posts = Posts::where('post_category', $category->id)
                    ->inRandomOrder()
                    ->with('postable')
                    ->simplePaginate(20);

                foreach ($posts as $post) {
                    $post->post_top_image = json_decode($post->post_top_image);
                }
                $poemdata['posts'] = $posts;
            }
        }else {
            $posts = Posts::inRandomOrder()
                ->with('postable')
                ->simplePaginate(20);
            foreach ($posts as $post) {
                $post->post_top_image = json_decode($post->post_top_image);
            }
            $poemdata['posts'] = $posts;
        }


        $recomended = Posts::inRandomOrder()
            ->with('postable')
            ->simplePaginate(7);
        $poemdata['recomended'] = $recomended;
        foreach ($recomended as $post) {
            $post->post_top_image = json_decode($post->post_top_image);
        }

        return view('post.poems', compact('poemdata'));
    }
}
