<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    //

     public function __construct()
     {
           $this->middleware('auth');
     }

     public function index()
     {
         # code...

         return view('settings.index');
     }
}
