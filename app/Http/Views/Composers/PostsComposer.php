<?php

namespace App\Http\Views\Composers;

use App\Models\Posts\Posts;
use Illuminate\View\View;
use Faker\Generator as Faker;

class PostsComposer
{

    public function compose(View $view)
    {
        $posts = Posts::orderBy('created_at', 'DESC')
            ->where("post_publish_status", true)
            ->where("is_suspended", false)
            ->where("status", true)
            ->simplePaginate(20);

        $recomended = Posts::inRandomOrder()
            ->where("post_publish_status", true)
            ->where("is_suspended", false)
            ->where("status", true)
            ->simplePaginate(30);
        foreach ($posts as $post) {
            $post['artist'] = $post->postable()->first()->get(
                'id',
                'name',
                'email'
            );

            $post->post_top_image = json_decode($post->post_top_image);
        }
        foreach ($recomended as $post) {

            $post['artist'] = $post->postable()->first()->get(
                'id',
                'name',
                'email'
            );

            $post->post_top_image = json_decode($post->post_top_image);
        }

        $data = array();
        $data['posts'] = $posts;
        $data['recomended'] = $recomended;



        $view->with('data', $data);
    }
}
