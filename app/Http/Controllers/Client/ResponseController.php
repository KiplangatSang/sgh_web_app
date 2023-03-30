<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Mail\GuestMessageMail;
use App\Models\Client\ClientResponse;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ResponseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //dd($request->all());
        $request->validate(

            [
                'name' => 'required',
                'email' => ['required', 'email'],
                'message' => 'required',
            ]
        );

        $clientres = ClientResponse::create([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'message' => $request->message,
        ]);


        # code...
        $result =  $this->sendGuestEmail($request->name, $request->email, $request->message);

        if (!$result)
            return back()->with('error', "Could not send this mesage");


        if ($clientres)
            return back()->with('success', 'Success! Message has been delivered. Thanks for reaching out ")');
        else
            return back()->with('error', 'Sorry! Could not send message !!');
    }

    public function sendGuestEmail($name, $email, $message)
    {
        # code...
        try {
            $guestMail =  new GuestMessageMail($name, $email, $message);
            Mail::to('stormsco@storms.co.ke')->send($guestMail);
            return "The message has been sent";
        } catch (Exception $e) {
            $e->getMessage();
            info($e->getMessage());
            return false;
        }
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
