<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Models\Posts\Posts;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{




    public function index()
    {
        //
        //$user = User::whereIn('id',auth()->user())->first();

        $posts = Posts::orderBy('created_at','DESC')->get();

        foreach($posts as $post){

            $post['artist'] =User::whereIn('id',$post)->first()->get('id',
            'name',
            'email');
        }
        $data = array();
        $data['posts'] = $posts;

        return $data;
       }

       public function show($id)
    {
        //
        //$user = User::whereIn('id',auth()->user())->first();

        $post = Posts::where('id',$id)->first();
        $data = array();
        $data['post'] = $post;

        return $data;
       }

}
