<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TwitterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }


    /**
     * Show the form for creating a new resource.
     */


    function buildBaseString($url, $method, $params)
    {
        $r = array();
        ksort($params);
        foreach ($params as $key => $value) {
            $r[] = "$key=" . rawurlencode($value);
        }
        return $method . '&' . rawurlencode($url) . '&' . rawurlencode(implode('&', $r));
    }

    public function create()
    {


        // Set the URL endpoint
        $url = 'https://api.twitter.com/2/tweets';

        $consumerKey = '****saxE8g';
        $consumerSecret = '****saxE8g';
        $accessToken = '962371803204214784-VqkAWM2CEVMMsgyBXSq0GUv4R4cTzGk';
        $accessTokenSecret = 'mOemdDeIvL35wGdB503foybxf8KKofX40i7HadXJtxcJP';

        $oauth = array(
            'oauth_consumer_key' => $consumerKey,
            'oauth_nonce' => time(),
            'oauth_signature_method' => 'HMAC-SHA1',
            'oauth_token' => $accessToken,
            'oauth_timestamp' => time(),
            'oauth_version' => '1.0'
        );

        $baseInfo = $this->buildBaseString($url, 'POST', $oauth);
        $compositeKey = rawurlencode($consumerSecret) . '&' . rawurlencode($accessTokenSecret);
        $oauth['oauth_signature'] = base64_encode(hash_hmac('sha1', $baseInfo, $compositeKey, true));


        $header = array(
            'Authorization: OAuth ' . http_build_query($oauth, '', ','),
            'Content-Type: application/x-www-form-urlencoded',
        );




        $ch = curl_init();


        // Set your POST data
        $data = array(
            'status' => 'This is my tweet!', // Your tweet content
        );

        // Set cURL options
        $options = array(
            CURLOPT_URL => $url,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => http_build_query($data),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => $header,
        );

        // Set the cURL options
        curl_setopt_array($ch, $options);




        // Execute the cURL request
        $response = curl_exec($ch);

        // Check for errors
        if ($response === false) {
            $error = curl_error($ch);
            return $error;
            // Handle the error
        } else {
            return $response;
            // Handle the successful response
            // The $response variable contains the response from Twitter
        }

        // Close the cURL session
        curl_close($ch);

        return $response;
    }
    // {
    //     //

    //     //return true;

    //     $ch = curl_init();

    //     // Set the URL endpoint
    //     $url = 'https://api.twitter.com/2/tweets';

    //     // Set your POST data
    //     $data = array(
    //         'status' => 'This is my tweet!', // Your tweet content
    //     );

    //     // Set cURL options
    //     $options = array(
    //         CURLOPT_URL => $url,
    //         CURLOPT_POST => true,
    //         CURLOPT_POSTFIELDS => http_build_query($data),
    //         CURLOPT_RETURNTRANSFER => true,
    //         CURLOPT_HTTPHEADER => array(
    //             'Authorization: Bearer AAAAAAAAAAAAAAAAAAAAANLcnwEAAAAAC%2BtBPfBCUnj7qgfIO4o38z%2F416k%3D95KxlSl1hFYWpwlcFznvbSUErn9POfU6UfCzU9vSWSYb3kDRjO', // Replace with your access token
    //         ),
    //     );

    //     // Set the cURL options
    //     curl_setopt_array($ch, $options);

    //     // Execute the cURL request
    //     $response = curl_exec($ch);

    //     // Check for errors
    //     if ($response === false) {
    //         $error = curl_error($ch);
    //         // Handle the error
    //     } else {
    //         // Handle the successful response
    //         // The $response variable contains the response from Twitter
    //     }

    //     // Close the cURL session
    //     curl_close($ch);

    //     return   $response;
    // }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
