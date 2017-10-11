<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use Auth;
// models
use App\Univer;
use App\Country;
use App\Lang;
use App\User;

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
        
        elseif(Auth::guard('admin')->check())
            $panel = 'admind';
        
        elseif(Auth::guard('comp')->check())
            $panel = 'compd';
        else
            $panel = '';
        
        if($user_in == true)
            return redirect('/'. $panel);
        else
            return view('welcome')->with('user_in', $user_in)->with('reg', $reg_info)->with('panel', $panel);
    }

    public function showUserProfile($username){
        $user = User::where('u_username',$username)->first();
        if($user != null)
            $user = (object) $user->toArray();
        else
            return view('errors.not_exists');
        return view('show_user')->with('user', $user);
    }
    
    public function mail(){
        Mail::send('emails.confirm', [
            'theRoute' => 'confirm/user/123123'
        ], function($message){
            $message->from('webmaster@zeyd.org', 'Verify Your Account');
            $message->to('atfsy.syrian@gmail.com')->subject('Verify Your Account');
            echo var_dump($message);
        });
    }
}
