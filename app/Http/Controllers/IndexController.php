<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
// models
use App\Univer;
use App\Country;
use App\Lang;

class IndexController extends Controller
{
    public function index(){
        $reg_info = (object) [
            'univers' => Univer::all(),
            'langs' => Lang::all(),
            'countries' => Country::all()
        ];
        
        if(Auth::check() || Auth::guard('admin')->check() || Auth::guard('comp')->check())
            $user_in = true;
        else
            $user_in = false;

        if(Auth::check())
            $panel = 'userd';
        
        if(Auth::guard('admin')->check())
            $panel = 'admind';
        
        if(Auth::guard('comp')->check())
            $panel = 'compd';
        else
            $panel = '';
        return view('welcome')->with('user_in', $user_in)->with('reg', $reg_info)->with('panel', $panel);
    }
}
