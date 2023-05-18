<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        // $user = User::whereIn('id',auth()->user())->first();


        $user = User::where('id', $id)->first();

        $posts =  $user->posts()->orderBy('created_at', 'DESC')->simplePaginate(config('app.posts_pagination'));
        $postdata = array();
        $postdata['posts'] = $posts;

        return view('admin.accounts.accountarticles.index', compact('postdata'));
    }
}
