<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\BeneCompany;
use Auth;
use App;

class BeneController extends Controller
{
    public function login(){
        return view('bene.login');
    }

    public function loginPost(Request $req){
        $auth = BeneCompany::where('bene_comp_email',$req->email)->where('bene_comp_password',sha1($req->password))->first();
        // echo var_dump($auth);
        // die();
        if($auth){
            Auth::guard('bene')->login($auth, true);
            return redirect('bened');
            
        }else{
            echo "Invalid login";
        }
    }
    
    public function register(){
        return view('bene.register');
    }

    public function registerPost(){
        
            $bene = new BeneCompany;

            $this->validate(request(),[
                'bene_name'=>'required|min:4',
                'bene_phone'=>'required|min:4',
                'bene_owner'=>'required|min:4',
                'bene_manager'=>'required|min:4',
                'bene_email'=>'required|string|email',
                'bene_password'=>'required|min:6',
            ]);
            
            if(!isset($errors)){
                $benes = BeneCompany::where('bene_comp_email', request('bene_email'))->get();
                
                if(count($benes) > 0){
                    $resp = [
                        "errors" => [
                            'err1' => "This email already exists!!",
                        ],
                        "status" => false,
                    ];
                }else{
                    $bene->insert([
                        "bene_comp_name" => request('bene_name'),
                        "bene_comp_phone" => request('bene_phone'),
                        "bene_comp_email" => request('bene_email'),
                        "bene_comp_manager" => request('bene_manager'),
                        "bene_comp_password" => sha1(request('bene_password')),
                        "bene_comp_owner" => request('bene_owner'),
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
