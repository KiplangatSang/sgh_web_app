<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Articles\Categories;
use App\Models\Posts\Posts;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends BaseController
{
    /**
     * Display a listing of the resource.
     */


    public function __construct()
    {
    }
    public function index()
    {
        //

        $posts = $this->user()->posts()->orderBy('created_at', 'DESC')->get();


       // return  $posts;

        return view('author.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        //
        // return auth()->id();
        $images = $this->user()->postImages()->whereNotNull('image')->orderBy('created_at', 'DESC')->get();
        $top_images = $this->user()->postImages()->whereNotNull('post_top_image')->orderBy('created_at', 'DESC')->get();
        $category = Categories::all();

        // dd($category);
        $postdata['images'] = $images;
        $postdata['category'] = $category;
        $postdata['top_images'] = $top_images;

        return view('author.post.create', compact('postdata'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        // dd($request->all());
        $request->validate([
            'post_category' => 'required',
            'post_title' => 'required',
            'post_subtitle' => 'required',

        ]);


        try {
            $post_id = urlencode(htmlspecialchars($request['post_title']));
            $post_top_image = json_encode(session('image_title'));
            $result = $this->user()->posts()->create(
                [
                    'post_id' => $post_id,
                    'post_title' => $request->post_title,
                    'post_subtitle' => $request->post_subtitle,
                    'post_category' => $request->post_category,
                    'post_top_image' => $post_top_image,
                    'post_verification' => false,
                    'post_publish_status' => false,
                    'post_regulation' => false,
                ]
            );

            return redirect(route('author.post.postbody.create', ['post' => $result->id]))->with('success', 'Post Uploaded');
        } catch (Exception $e) {
            return back()->with('message', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */

    public function show($id)
    {
        //
        $post = Posts::where('id', $id)->first();
        $comments = $post->comments()->get();
        $likes = $post->likes()->get();


        $postsdata = array();
        $postsdata['post'] = $post;
        $postsdata['comments'] = $comments;
        $postsdata['likes'] = $likes;

        //  dd($postsdata['comments']);

        return view('author.post.show', compact('postsdata'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $images = $this->user()->postImages()->whereNotNull('image')->orderBy('created_at', 'DESC')->get();
        $top_images = session('image_title');


        $category = Categories::all();

        $post = Posts::where('id', $id)->first();
        $postcategory = Categories::where('id', $post->post_category)->first();

        $post->post_category_name =  $postcategory->category;

        $postdata['images'] = $images;
        $postdata['category'] = $category;
        $postdata['post'] = $post;
        $postdata['top_images'] = $top_images;


        return view('author.post.edit', compact('postdata'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'post_category' => 'required',
            'post_title' => 'required',
            'post_subtitle' => 'required',

        ]);
        $post = Posts::where('id', $id)->first();
        $post_top_image = json_encode(session('image_title'));
        try {
            $post->update(
                [
                    'post_title' => $request->post_title,
                    'post_subtitle' => $request->post_subtitle,
                    'post_category' => $request->post_category,
                    'post_top_image' => $post_top_image,
                    'post_verification' => false,
                    'post_publish_status' => false,
                    'post_regulation' => false,
                ]
            );
            return redirect(route('author.post.postbody.edit', ['post' => $post->id, 'postbody' => $post->id]))->with('success', 'Update success, Edit your article now');
        } catch (Exception $e) {
            return back()->with('message', $e->getMessage());
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Posts::destroy($id);
        return redirect(route('author.posts.index'))->with('success', 'Post Deleted');
    }

    public function preview(Request $request, $id)
    {
        # code...
        $request->validate([
            'post_body' => 'required',

        ]);

        $post = Posts::where('id', $id)->first();
        $post->update([
            'post_top_image' => json_encode(session('image_title')),
            'post_body' => $request->post_body,
            'post_verification' => false,
            'post_publish_status' => false,
            'post_regulation' => false,
        ]);

        $post = Posts::where('id', $id)->first();
        $postsdata = array();
        $postsdata['post'] = $post;
        $postsdata['comments'] = null;
        $postsdata['likes'] = null;

        // dd($postsdata);

        return view('author.post.show', compact('postsdata'));
    }

    public function viewInWeb(Request $request, $id)
    {
        # code...
        $request->validate([
            'post_body' => 'required',

        ]);

        $post = Posts::where('id', $id)->first();
        $post->update([
            'post_top_image' => json_encode(session('image_title')),
            'post_body' => $request->post_body,
            'post_verification' => false,
            'post_publish_status' => false,
            'post_regulation' => false,
        ]);

        $post = Posts::where('id', $id)->first();
        $postsdata = array();
        $postsdata['post'] = $post;
        $postsdata['comments'] = null;
        $postsdata['likes'] = null;

        // dd($postsdata);

        return view('author.post.show', compact('postsdata'));
    }
}
