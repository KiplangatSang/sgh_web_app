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
                    ->where("post_publish_status", true)
                    ->where("is_suspended", false)
                    ->where("status", true)
                   ->simplePaginate(config('app.posts_pagination'));

                foreach ($posts as $post) {
                    $post->post_top_image = json_decode($post->post_top_image);
                }
                $poemdata['posts'] = $posts;
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
            $poemdata['posts'] = $posts;
        }


        $recomended = Posts::inRandomOrder()
            ->with('postable')
            ->where("post_publish_status", true)
            ->where("is_suspended", false)
            ->where("status", true)
            ->simplePaginate(config('app.recommended_pagination'));
        $poemdata['recomended'] = $recomended;
        foreach ($recomended as $post) {
            $post->post_top_image = json_decode($post->post_top_image);
        }

        return view('post.poems', compact('poemdata'));
    }
}
