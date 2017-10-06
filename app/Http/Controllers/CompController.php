<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Company;
use Auth;
use App;

class CompController extends Controller
{    
    public function login(){
        return view('comps.login')->with('user_in', $this->user_in);;
    }

    public function loginPost(Request $req){
        $auth = Company::where('comp_email',$req->email)->where('comp_password',sha1($req->password))->first();
        // echo var_dump($auth);
        // die();
        if($auth){
            if(request('remember') == true || request('remember') == false)
                $remember = request('remember');
            else
                $remember = false;
            Auth::guard('comp')->login($auth, $remember);
            // return redirect('compd');
            return [
                'status' => true,
                'panel' => route('compd'),
                'msg' => 'Logged in!!'
            ];
            
        }else{
            return [
                'status' => false,
                'msg' => 'Unable To login, Password or email not correct'
            ];
        }
    }
    
    public function register(){
        return view('comps.register')->with('user_in', $this->user_in);;
    }

    public function registerPost(){
        
            $comp = new Company;
            $this->validate(request(),[
                'comp_name'=>'required|min:4',
                'comp_phone'=>'required|min:4',
                'comp_owner'=>'required|min:4',
                'comp_manager'=>'required|min:4',
                'comp_email'=>'required|string|email',
                'comp_password'=>'required|min:6',
            ]);
            if(!isset($errors)){
                $comps = Company::where('comp_email', request('comp_email'))->get();
                
                if(count($comps) > 0){
                    $resp = [
                        "errors" => [
                            'err1' => "This email already exists!!",
                        ],
                        "status" => false,
                    ];
                }else{
                    $comp->insert([
                        "comp_name" => request('comp_name'),
                        "comp_phone" => request('comp_phone'),
                        "comp_email" => request('comp_email'),
                        "comp_manager" => request('comp_manager'),
                        "comp_password" => sha1(request('comp_password')),
                        "comp_owner" => request('comp_owner'),
                    ]);
                    
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
