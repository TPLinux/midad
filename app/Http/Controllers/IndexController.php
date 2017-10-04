<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class IndexController extends Controller
{
    public function index(){

        if(Auth::check() || Auth::guard('admin')->check() || Auth::guard('comp')->check())
            $user_in = true;
        else
            $user_in = false;

        return view('welcome')->with('user_in', $user_in);
    }
}
