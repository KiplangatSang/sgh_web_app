<?php

namespace App\Http\Controllers;

use App\Models\Articles\Categories;
use App\Models\Posts\Comments;
use App\Models\Posts\Posts;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        if (auth()->user()->isAdmin == true  && User::admin) {
            $userscount = count(User::all());
            $articlescount = count(Posts::all());
            $publishedcount = count(Posts::all());
            $categoriescount = count(Categories::all());


            $homedata = array();

            $homedata['userscount'] = $userscount;
            $homedata['articlescount'] =  $articlescount;
            $homedata['publishedcount'] = $publishedcount;
            $homedata['categoriescount'] = $categoriescount;





            return view('admin.home', compact('homedata'));
        } else {
            if (auth()->user()->role == User::author) {
                $user = User::where('id', auth()->user()->id)->first();

                $posts = $user->posts()->orderBy('created_at', 'DESC')->get();
                $comments = Comments::all();


                $data = array();
                $data['posts'] = $posts;
                $data['comments'] = $comments;


                return view('home', compact('data'));
            } else {
                return;
            }
        }
    }
}
