<?php

namespace App\Http\Repositories\Firebase;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Kreait\Firebase\Factory;
use Illuminate\Support\Str;

class StorageRepository
{

    protected $factory = null;
    public function __construct()
    {
        // $this->factory = (new Factory)
        // ->withServiceAccount(base_path(env('FIREBASE_CREDENTIALS')))
        // ->withDatabaseUri('https://storm3blog-default-rtdb.firebaseio.com');
    }


    public function store($file)
    {
        //

        $storage = app('firebase.storage'); // This is an instance of Google\Cloud\Storage\StorageClient from kreait/firebase-php library
        $defaultBucket = $storage->getBucket();
        $image = $file;
        $name = (string) Str::uuid() . "." . $image->getClientOriginalExtension(); // use Illuminate\Support\Str;
        $pathName = $image->getPathName();


        $file = fopen($pathName, 'r');
        $object = $defaultBucket->upload($file, [
            'name' => auth()->user()->id . "/" . $name,
            'predefinedAcl' => 'publicRead'
        ]);
        $image_url = 'https://storage.googleapis.com/' . env('FIREBASE_PROJECT_ID') . '.appspot.com/' . auth()->user()->id . "/" . $name;
        //dd($file);
        return $image_url;
        try {
        } catch (Exception $e) {
            info($e->getMessage());
        }
    }
}
