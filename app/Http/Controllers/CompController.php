<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Company;
use App\Work;
use App\City;
use App\Country;
use DB;
use Auth;
use App;

class CompController extends Controller
{
    public function updateSettings(Request $req){
        // return $req;
        $username_exists = Company::where('comp_username', $req->username)->first();

        if($username_exists != null){
            $new_user = Auth::guard('comp')->user()->comp_username;
            $comp_msg = false;
        }else{
            $new_user = $req->username;
            $comp_msg = true;
        }

        if($req->username == Auth::guard('comp')->user()->comp_username)
            $comp_msg = 'same';

        
        $data = [
            'comp_username' => $new_user,
            'comp_name' => $req->name,
            'comp_name_en' => $req->name_en,
            'comp_work' => $req->work,
            'comp_email' => $req->email,
            'comp_password' => sha1($req->password),
            'comp_lnumber' => $req->lnumber,
            'comp_phone' => $req->phone,
            'comp_manager' => $req->manager,
            'comp_owner' => $req->owner,
            'comp_country' => $req->country,
            'comp_city' => $req->city,
            'comp_location' => $req->location,
        ];

        Company::where('comp_id', Auth::guard('comp')->user()->comp_id)->update($data);
        return [
            'success' => true,
            'username' => $comp_msg
        ];
    }
    
    public function settings(){
        $comp = (object) Auth::guard('comp')->user()->toArray();
        $comp = DB::table('companies')
              ->leftJoin('countries', 'countries.country_id' , '=', 'companies.comp_country')
              ->leftJoin('cities', 'cities.city_id' , '=', 'companies.comp_city')
              ->leftJoin('works', 'works.work_id' , '=', 'companies.comp_work')
              ->select('companies.*', 'countries.*', 'cities.*', 'works.*')
              ->where('companies.comp_email', $comp->comp_email)
              ->where('companies.comp_id', $comp->comp_id)
              ->first();
        $works =  Work::all();
        $countries =  Country::all();
        $cities =  City::all();
        return view('comps.settings')
            ->with('works', $works)
            ->with('countries', $countries)
            ->with('cities', $cities)
            ->with('comp', $comp)
            ->with('user_in', $this->user_in);
    }

    public function uploadCover(Request $req){
        $custom_adds = mb_substr(sha1(sha1(Auth::guard('comp')->user()->comp_email) . time()), 0, 7) . "_" . mb_substr(md5(sha1(Auth::guard('comp')->user()->comp_email) . time() * time()), -10);
        $image = $this->uploadImageCrop($req->image, $custom_adds);
        Company::where('comp_email',Auth::guard('comp')->user()->comp_email)->update([
            'comp_cover' => $image->image_name
        ]);

        return ['success' => true];
    }
    
    public function upload(Request $req){
        $custom_adds = mb_substr(sha1(sha1(Auth::guard('comp')->user()->comp_email) . time()), 0, 7) . "_" . mb_substr(md5(sha1(Auth::guard('comp')->user()->comp_email) . time() * time()), -10);
        $image = $this->uploadImageCrop($req->image, $custom_adds);
        Company::where('comp_email',Auth::guard('comp')->user()->comp_email)->update([
            'comp_logo' => $image->image_name
        ]);
        return ['success' => true];
    }
    
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
