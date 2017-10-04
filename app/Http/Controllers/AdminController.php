<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Admin;
use Auth;
use App;

class AdminController extends Controller
{
    public function login(){
        return view('admin-login')->with('user_in', $this->user_in);
    }

    public function loginPost(Request $req){
        $auth = Admin::where('admin_email',$req->email)->where('admin_password',sha1($req->password))->first();
        if($auth){
            Auth::guard('admin')->login($auth, true);
            return redirect('admind');
            
        }else{
            echo "Invalid login";
        }
    }
}
