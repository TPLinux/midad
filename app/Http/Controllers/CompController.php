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

    public function compDB(){
        $comp = Auth::guard('comp')->user();
        return view('comps.compd')->with('comp', (object) $comp->toArray());
        echo '<h2>Comp panel</h2>';
        echo "Your email is: " . $comp->comp_email;
        echo "<br/>";
        echo '';
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
                'laccept'=>'required',
                'comp_name'=>'required|min:4',
                'comp_name_en'=>'required|min:4',
                'comp_type'=>'required',
                'comp_sort'=>'required',
                'comp_lnumber'=>'required',
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
                        "comp_confirm_code" => '123123',
                        "comp_name" => request('comp_name'),
                        "comp_name_en" => request('comp_name_en'),
                        "comp_lnumber" => request('comp_lnumber'),
                        "comp_type" => request('comp_type'),
                        "comp_sort" => request('comp_sort'),
                        "comp_email" => request('comp_email'),
                        "comp_password" => sha1(request('comp_password')),
                    ]);

                    $login = Company::where('comp_email', request('comp_email'))->where('comp_password', sha1(request('comp_password')))->first();
                    Auth::guard('comp')->login($login, false);
                    
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

    // confirm comp
    public function confirmComp($ccode){
        $code_exists = Company::where('comp_confirm_code', $ccode)->first();
        if($code_exists){
            Company::where('comp_confirm_code', $ccode)->update([ 'comp_confirmed' => true ]);
            return redirect('compd');
        }
        else
            dd('no');
    }
}
