<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App;
use Auth;

class UsersController extends Controller
{
    public function index(){
        
    }

    public function register(){
        return view('register')->with('user_in', $this->user_in);
    }

    public function login(){
        return view('login')->with('user_in', $this->user_in);
    }

    public function loginPost(Request $req){

        $auth = User::where('u_email',$req->email)->where('u_password',sha1($req->password))->first();
        if($auth){
            Auth::login($auth, true);
            // return redirect('userd');
            return [
                'status' => true,
                'panel' => route('userd'),
                'msg' => 'Logged in!!'
            ];
            
        }else{
            return [
                'status' => false,
                'msg' => 'Unable To login, Password or email not correct'
            ];
        }
    }
    
    public function registerPost(){
        
            $user = new User;

            $this->validate(request(),[
                'u_fname'=>'required|min:4',
                'u_lname'=>'required|min:4',
                'u_country'=>'required|min:1',
                'u_univer'=>'required|min:1',
                'u_lang'=>'required|min:1',
                'u_email'=>'required|string|email',
                'u_password'=>'required|min:6',
            ]);
            
            if(!isset($errors)){
                $users = User::where('u_email', request('u_email'))->get();
                
                if(count($users) > 0){
                    $resp = [
                        "errors" => [
                            'err1' => "This account already exists!!",
                        ],
                        "status" => false,
                    ];
                }else{
                    $user->insert([
                        "u_fname" => request('u_fname'),
                        "u_lname" => request('u_lname'),
                        "u_country" => request('u_country'),
                        "u_univ_name" => request('u_univer'),
                        "u_lang" => request('u_lang'),
                        "u_email" => request('u_email'),
                        "u_password" => sha1(request('u_password')),
                        "u_confirm_code" => "123123",
                    ]);
                    $login = User::where('u_email', request('u_email'))->where('u_password', sha1(request('u_password')))->first();
                    Auth::login($login, true);
                    $resp = [
                        "errors" => [],
                        "status" => true,
                        "msg" => "registered!!"
                    ];
                }
            }else{
                $resp = [
                    "errors" => $errors,
                    "status" => false,
                    "msg" => "fields required!"
                ];
            }
            
            return $resp;
    }
    
}
