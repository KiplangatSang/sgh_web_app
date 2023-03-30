<?php

namespace App\Http\Controllers;

use Illuminate\Http\Client\Factory as ClientFactory;
use Illuminate\Http\Request;

use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;

class FirebaseController extends Controller
{

    protected $factory = null;
    public function __construct()
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     * allow write: if "auth.token.email === 'kiplangatsang425@gmail.com'";
     *
     */
    public function index()
    {
        //  $serviceAccount = ServiceAccount::fromJsonFile(base_path(env('FIREBASE_CREDENTIALS')));
        // $firebase = (new Factory)
        // ->withServiceAccount($serviceAccount)
        // ->withDatabaseUri("https://storm3blog-default-rtdb.firebaseio.com")
        // ->create();


        $database = $this->factory->createDatabase();

        // $database = $firebase->getDatabase();
        $newPost = $database
            ->getReference('blog/posts')
            ->push([
                'title' => 'Post title',
                'body' => 'I mf did it.'
            ]);
        //$newPost->getKey(); // => -KVr5eu8gcTv7_AHb-3-
        //$newPost->getUri(); // => https://my-project.firebaseio.com/blog/posts/-KVr5eu8gcTv7_AHb-3-
        //$newPost->getChild('title')->set('Changed post title');
        //$newPost->getValue(); // Fetches the data from the realtime database
        //$newPost->remove();
        echo "<pre>";
        print_r($newPost->getvalue());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
   {}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $storage = app('firebase.storage'); // This is an instance of Google\Cloud\Storage\StorageClient from kreait/firebase-php library
        $defaultBucket = $storage->getBucket();
        // $image = $request->file('image');
        // $name = (string) Str::uuid().".".$image->getClientOriginalExtension(); // use Illuminate\Support\Str;
        //$pathName = $image->getPathName();

        $name = "Sang.png";
        $file = fopen(public_path('/articleImages/62515878a0965_Profile.png'), 'r');
        $object = $defaultBucket->upload($file, [
            'name' => "ena/" . $name,
            'predefinedAcl' => 'publicRead'
        ]);
        $image_url = 'https://storage.googleapis.com/' . env('FIREBASE_PROJECT_ID') . '.appspot.com/' . $name;
        //dd($file);
        return $image_url;
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
    }
}
