<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Posts\Posts;
use App\Models\Subscribers;
use Illuminate\Http\Request;

class LikesController extends Controller
{
    //
    public function index($postId)
    {
        # code...
        $post = Posts::where('id', $postId)->first();

        $likes = $post->likes->get();
        return $likes;
    }

    public function create($postId, $subscriber_id, Request $request)
    {
        # code...
        $post = Posts::where('id', $postId)->first();
        $subscriber = Subscribers::where('id', $subscriber_id)->first();

        $likes = $post->likes->create(
            [

                'user_id' => $subscriber->id,
                'likes' => $request->like,
                'month' => date('M'),
                'year' => date('Y'),

            ]
        );
        return $likes;
    }
}
