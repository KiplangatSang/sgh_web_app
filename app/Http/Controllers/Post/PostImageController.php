<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Firebase\StorageRepository;
use App\Models\Posts\Posts;
use App\Models\Posts\PostsImages;
use App\Models\User;
use Exception;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PostImageController extends Controller
{


    protected $paginate = 40;
    public function index()
    {
        //

        $images = PostsImages::simplePaginate($this->paginate);
        return view('author.images.index', compact('images'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('author.images.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        //

        $uploadfile = $request->file('file');

        $storageRepo = new StorageRepository();
        $image = $storageRepo->store($uploadfile);


        $post = Posts::where('id', $id)->first();

        $post->postImages()->create([
            'image' => $image,
        ]);

        $imageArr = array();
        if (session()->has('images')) {
            $imageArr =  session('images');
        }
        array_push($imageArr, $image);
        $request->session()->put('images', $imageArr);
    }


    public function storeTitleImage(Request $request, $id)
    {
        $uploadfile = $request->file('file');

        $storageRepo = new StorageRepository();
        $image = $storageRepo->store($uploadfile);


        $imageArray = array();
        if (session()->has('image_title')) {
            $imageArray =  session('image_title');
        }
        array_push($imageArray, $image);
        $request->session()->put('image_title', $imageArray);
    }

    public function uploadImageToFirebase(Request $request)
    {

        $storageRepo = new StorageRepository();
        $image = $storageRepo->store($request->file);
        return $image;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        $image =   PostsImages::findOrFail($id);
        $images = PostsImages::simplePaginate($this->paginate);
        return view('author.images.show', compact('images', 'image'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $image =   PostsImages::findOrFail($id);
        $images = PostsImages::simplePaginate($this->paginate);
        return view('author.images.show', compact('images', 'image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        PostsImages::destroy($id);
    }

    public function fileTestUpload(Request $request)
    {
        # code...
        $storageRepo = new StorageRepository();
        $image = $storageRepo->store(request()->file('file'));

        // dd($image);

        $user = User::whereIn('id', auth()->user())->first();

        $user->postImages()->create([
            'image' => $image,
        ]);

        $images = $user->postImages()->orderBy('created_at', 'DESC')->get();
        $postdata = array();
        $postdata['images'] = $images;


        return response()->json([
            'name'          => $images,
            'original_name' => $request->file('file')->getClientOriginalName(),
        ]);
    }
}
