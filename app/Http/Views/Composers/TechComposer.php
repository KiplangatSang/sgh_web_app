<?php

namespace App\Http\Views\Composers;

use App\Posts\Posts;
use App\User;
use Carbon\Carbon;
use Faker\Core\Color;
use Illuminate\View\View;
use Faker\Generator as Faker;

class TechComposer
{
    public function compose(View $view)
    {
        // $posts = Posts::where('post_category','Tech')->orderBy('created_at','DESC')->simplePaginate(20);
        // $recomended = Posts::where('post_category','Tech')->inRandomOrder()->simplePaginate(7);;

        // foreach($posts as $post){

        //     $post['artist'] =$post->postable()->first()->get('id',
        //     'name',
        //     'email');

        //     $post->post_top_image = json_decode( $post->post_top_image);
        // }
        // foreach($recomended as $post){

        //     $post['artist'] =$post->postable()->first()->get('id',
        //     'name',
        //     'email');

        //     $post->post_top_image = json_decode( $post->post_top_image);
        // }

        // $data = array();
        // $data['posts'] = $posts;
        // $data['recomended'] = $recomended;



        // $view->with('techdata', $data);
    }
}
