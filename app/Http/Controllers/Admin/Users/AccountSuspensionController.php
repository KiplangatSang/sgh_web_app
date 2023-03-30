<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AccountSuspensionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$account = User::all();
        //dd($accountusers);
        $suspended = User::where('isSuspended', true)->get();
        $active = User::where('isSuspended', false)->get();
        $admin = User::where('isAdmin', true)->get();

        $accountsdata = array();
        $accountsdata['accounts'] =$suspended;
        $accountsdata['suspended'] = $suspended;
        $accountsdata['active'] = $active;
        $accountsdata['admin'] = $admin;

        //dd($accountsdata);

        return view('admin.suspendedaccounts.index', compact('accountsdata'));
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

        $user = User::where('id',$id)->update(
            [
                'isSuspended' => true,
            ]
            );


          //  dd($user);
       return redirect('/admin/account/users/show/'.$id)->with('success', 'Account Updated ');;


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
