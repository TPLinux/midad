<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\DonerCompany;
use Auth;
use App;

class DonerController extends Controller
{    
    public function login(){
        return view('doners.login');
    }

    public function loginPost(Request $req){
        $auth = DonerCompany::where('doner_comp_email',$req->email)->where('doner_comp_password',sha1($req->password))->first();
        // echo var_dump($auth);
        // die();
        if($auth){
            Auth::guard('doner')->login($auth, true);
            return redirect('donerd');
            
        }else{
            echo "Invalid login";
        }
    }
    
    public function register(){
        return view('doners.register');
    }

    public function registerPost(){
        
            $doner = new DonerCompany;

            $this->validate(request(),[
                'doner_name'=>'required|min:4',
                'doner_phone'=>'required|min:4',
                'doner_owner'=>'required|min:4',
                'doner_manager'=>'required|min:4',
                'doner_email'=>'required|string|email',
                'doner_password'=>'required|min:6',
            ]);
            
            if(!isset($errors)){
                $doners = DonerCompany::where('doner_comp_email', request('doner_email'))->get();
                
                if(count($doners) > 0){
                    $resp = [
                        "errors" => [
                            'err1' => "This email already exists!!",
                        ],
                        "status" => false,
                    ];
                }else{
                    $doner->insert([
                        "doner_comp_name" => request('doner_name'),
                        "doner_comp_phone" => request('doner_phone'),
                        "doner_comp_email" => request('doner_email'),
                        "doner_comp_manager" => request('doner_manager'),
                        "doner_comp_password" => sha1(request('doner_password')),
                        "doner_comp_owner" => request('doner_owner'),
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
