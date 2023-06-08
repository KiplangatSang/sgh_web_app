<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\BaseController;
use App\Models\Articles\Categories;
use App\Http\Controllers\Controller;
use App\Models\Posts\Posts;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use App\Models\posts\comments;
use Illuminate\Support\Str;

class PostBodyController extends BaseController
{

    /**
     * Use this controller to edit and update article body only
     * The class stores or edits a post body
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($post)
    {
        //
        $user = User::where('id', auth()->user()->id)->first();
        $images = session('images');
        $top_images = session('image_title');

        $category = Categories::all();

        $post = Posts::where('id', $post)->first();
        $postcategory = Categories::where('id', $post->post_category)->first();
        $post->post_category_name =  $postcategory->category;

        $postdata['images'] = $images;
        $postdata['top_images'] = $top_images;

        $postdata['category'] = $category;
        $postdata['post'] = $post;

        //dd( ($postdata['images']));
        return view('author.post.article.create', compact('postdata'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($post, Request $request)
    {
        //

        // dd($request->postFormStatus);
        try {
            if ($request->postFormStatus == 0) {

                // if (!$request->post_body)
                //     $request["post_body"] = "";

                $post = Posts::where('id', $post)->first();
                $result =   $post->update(
                    [
                        'post_top_image' => json_encode(session('image_title')),
                        'post_body' => $request->post_body,
                        'post_verification' => false,
                        'post_publish_status' => false,
                        'post_regulation' => false,
                    ]
                );
            } else if ($request->postFormStatus == 1) {

                 //return "success";
                $request->validate([
                    'post_body' => 'required',

                ]);

                $post = Posts::where('id', $post)->first();

                $result =   $post->update(
                    [
                        'post_body' => $request->post_body,
                        'post_verification' => false,
                        'post_publish_status' => true,
                        'post_regulation' => false,
                    ]
                );

                if (!$result)
                    return back()->with('error', "Could not upload the article");

                session()->remove('image_title');
                session()->remove('images');
                return redirect(route('author.posts.index'))->with('success', 'Post has been ploaded');
            }
        } catch (Exception $e) {
            return back()->with('message', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $user = User::where('id', auth()->user()->id)->first();
        $images = session('images');
        $top_images = session('image_title');

        $category = Categories::all();

        $post = Posts::where('id', $id)->first();
        $postcategory = Categories::where('id', $post->post_category)->first();


        $post->post_category_name =  $postcategory->category;

        $postdata['images'] = $images;
        $postdata['top_images'] = $top_images;

        $postdata['category'] = $category;
        $postdata['post'] = $post;

        // dd($postdata['post']->post_body);

        return view('author.post.article.edit', compact('postdata'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'post_body' => 'required',

        ]);

        try {
            $post = Posts::where('id', $id)->first();

            $post->update(
                [
                    'post_top_image' => json_encode(session('image_title')),
                    'post_body' => $request->post_body,
                    'post_verification' => false,
                    'post_publish_status' => true,
                    'post_regulation' => false,
                ]
            );

            session()->remove('image_title');
            session()->remove('images');
            return redirect(route('author.posts.index'))->with('success', 'Post updated');
        } catch (Exception $e) {
            return back()->with('message', $e->getMessage());
        }

        return back()->with('error', "Could not upload the article");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
