<?php

namespace App\Http\Views\Composers;

use App\Models\Posts\Posts;
use Carbon\Carbon;
use Faker\Core\Color;
use Illuminate\View\View;
use Faker\Generator as Faker;

class ArticleComposer
{
    public function compose(View $view)
    {
        $posts = Posts::where('post_category','Articles')->orderBy('created_at','DESC')->simplePaginate(20);

        $recomended = Posts::where('post_category','Articles')->inRandomOrder()->simplePaginate(7);;

        foreach($posts as $post){

            $post['artist'] =$post->postable()->first()->get('id',
            'name',
            'email');

            $post->post_top_image = json_decode( $post->post_top_image);
        }
        foreach($recomended as $post){

            $post['artist'] =$post->postable()->first()->get('id',
            'name',
            'email');

            $post->post_top_image = json_decode( $post->post_top_image);
        }

        $articledata = array();
        $articledata['posts'] = $posts;
        $articledata['recomended'] = $recomended;

        $view->with('articledata', $articledata);
    }
}
