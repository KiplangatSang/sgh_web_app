<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        $account = User::all();
        //dd($accountusers);
        $suspended = User::where('isSuspended', true)->get();
        $active = User::where('isSuspended', false)->get();
        $admin = User::where('isAdmin', true)->get();

        $accountsdata = array();
        $accountsdata['accounts'] = $account;
        $accountsdata['suspended'] = $suspended;
        $accountsdata['active'] = $active;
        $accountsdata['admin'] = $admin;

        //dd($accountsdata);

        return view('admin.accounts.index', compact('accountsdata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.accounts.create');
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
        return redirect('/admin/account/users/index')->with('success', 'Account Created ');
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

        $account = User::where('id', $id)->first();

        $accountsdata = array();
        $accountsdata['account'] =  $account;

        return view('admin.accounts.show', compact('accountsdata'));
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

        $account = User::where('id', $id)->first();

        $accountsdata = array();
        $accountsdata['account'] =  $account;

        return view('admin.accounts.show', compact('accountsdata'));
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
        $data = $request->only(['isSuspended', 'isAdmin', 'isAuthor', 'role']);
        //

        $user = User::where('id', $id)->first();
        $result = $user->update(
            $request->all(),
        );

        if (!$result)
            return back()->with('error', 'Account could not be updated');

        return back()->with('success', 'Account has been updated successfully');
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
        $result =  User::destroy($id);

        if (!$result)
            return back()->with('error', 'Account could not be deleted');
        return redirect('/admin/account/users/index')->with('success', 'Account Deleted ');
    }
}
