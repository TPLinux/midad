<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App;
use Auth;
use App\User;
use App\Country;
use App\City;
use App\Lang;
use App\StudyClass;
use App\Univer;
use App\UniverSection;

class UsersController extends Controller
{
    
    public function index(){
        
    }

    public function updateSettings(Request $req){
        // return $req;
        $username_exists = User::where('u_username', $req->username)->first();

        if($username_exists != null){
            $new_user = Auth::user()->u_username;
            $user_msg = false;
        }else{
            $new_user = $req->username;
            $user_msg = true;
        }

        if($req->username == Auth::user()->u_username)
            $user_msg = 'same';
        
        $data = [
            'u_username' => $new_user,
            'u_age' => $req->age,
            'u_city' => $req->city,
            'u_country' => $req->country,
            'u_email' => $req->email,
            'u_password' => sha1($req->password),
            'u_fav_work' => $req->fav_work,
            'u_gender' => $req->gender,
            'u_status' => $req->user_status,
            'u_lang' => $req->lang,
            'u_location' => $req->location,
            'u_fname' => $req->fname,
            'u_lname' => $req->lname,
            'u_father_name' => $req->father_name,
            'u_study_city' => $req->study_city,
            'u_study_class' => $req->study_class,
            'u_study_country' => $req->study_country,
            'u_study_lang' => $req->study_lang,
            'u_study_year' => $req->study_year,
            'u_univ_name' => $req->univer_name,
            'u_univ_sec' => $req->univer_sec,
        ];

        User::where('u_id', Auth::user()->u_id)->update($data);
        return [
            'success' => true,
            'username' => $user_msg
        ];
    }

    public function settings(){
        $user = (object) Auth::user()->toArray();
        $user = DB::table('users')
              ->leftJoin('countries', 'countries.country_id' , '=', 'users.u_study_country')
              ->leftJoin('cities', 'cities.city_id' , '=', 'users.u_study_city')
              ->leftJoin('langs', 'langs.lang_id' , '=', 'users.u_study_lang')
              ->leftJoin('univer_sections', 'univer_sections.univer_sec_id' , '=', 'users.u_univ_sec')
              ->leftJoin('study_classes', 'study_classes.study_class_id' , '=', 'users.u_study_class')
              ->leftJoin('univers', 'univers.univer_id' , '=', 'users.u_univ_name')
              ->select('users.*', 'countries.*', 'cities.*', 'langs.*', 'univer_sections.*', 'univers.*', 'study_classes.*')
              ->where('users.u_email', $user->u_email)
              ->where('users.u_id', $user->u_id)
              ->first();
        
        $countryById = function($id){
            $country = Country::where('country_id', $id)->first();
            if($country != null){
                $country = (object) $country->toArray();
                return $country;
            }else
                return null;
        };

        $cityById = function($id){
            $city = City::where('city_id', $id)->first();
            if($city != null){
                $city = (object) $city->toArray();
                return $city;
            }else
                return null;
        };

        $langById = function($id){
            $lang = Lang::where('lang_id', $id)->first();
            if($lang != null){
                $lang = (object) $lang->toArray();
                return $lang;
            }else
                return null;
        };

        $settingsInfo = (object) [
            'countries' => Country::all()->toArray(),
            'cities' => City::all()->toArray(),
            'langs' => Lang::all()->toArray(),
            'univers' => Univer::all()->toArray(),
            'univer_sections' => UniverSection::all()->toArray(),
            'study_classes' => StudyClass::all()->toArray(),
        ];

        if(!isset($_GET['api'])){
            return view('users.settings')
                ->with('countryById', $countryById)
                ->with('cityById', $cityById)
                ->with('langById', $langById)
                ->with('user', $user)
                ->with('setting', $settingsInfo);
        }else{
            return [
                'user' => $user,
                'settings' => $settingsInfo,
            ];
        }
    }
    
    public function uploadCover(Request $req){
        $custom_adds = mb_substr(sha1(sha1(Auth::user()->u_email) . time()), 0, 7) . "_" . mb_substr(md5(sha1(Auth::user()->u_email) . time() * time()), -10);
        $image = $this->uploadImageCrop($req->image, $custom_adds);
        User::where('u_email',Auth::user()->u_email)->update([
            'u_cover' => $image->image_name
        ]);

        return ['success' => true];
    }
    
    public function upload(Request $req){
        $custom_adds = mb_substr(sha1(sha1(Auth::user()->u_email) . time()), 0, 7) . "_" . mb_substr(md5(sha1(Auth::user()->u_email) . time() * time()), -10);
        $image = $this->uploadImageCrop($req->image, $custom_adds);
        User::where('u_email',Auth::user()->u_email)->update([
            'u_pic' => $image->image_name
        ]);
        return ['success' => true];
    }
    
    
    public function userDB(){
        $user = Auth::user();
        $resp = [];
        $resp['user'] = (object) $user->toArray();
        if($user->u_confirmed == true){
            $resp['confirmed'] = true;
            $empty_fields_count = 0;
            // ignore from profile mist cont...
            $ignore_columns = [
                'u_team',
                'u_points',
                'created_at',
                'updated_at'
            ];
            foreach($resp['user'] as $k => $v){
                if(in_array($k, $ignore_columns))
                    continue;
                if($v == null)
                    $empty_fields_count += 1;
            }
            // dd($empty_fields_count);
            if($empty_fields_count > 0){
                $resp['empty_fields_count'] = $empty_fields_count;
                $resp['full_profile'] = false;
            }else{
                $resp['full_profile'] = true;
            }
        }else{
            $resp['confirmed'] = false;
        }
        
        $resp = (object) $resp;
        return view('users.userd_index')->with('user', $resp);
    }

    public function userDBAPI(){
        $user = Auth::user();
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
            if(request('remember') == true || request('remember') == false)
                $remember = request('remember');
            else
                $remember = false;
            Auth::login($auth, $remember);
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
                Auth::login($login, false);
                
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

    // confirm user
    public function confirmUser($ccode){
        $code_exists = User::where('u_confirm_code', $ccode)->first();
        if($code_exists){
            User::where('u_confirm_code', $ccode)->update([ 'u_confirmed' => true ]);
            return redirect('userd');
        }
        else
            dd('no');
    }
}
