<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/lang/{locale}',[
    'uses' => 'LanguageController@switchLang',
    'as' => 'lang.switch'
]);
// users
Route::get('/register','UsersController@register')->name('register');
Route::post('/register','UsersController@registerPost')->name('register');
// doners
Route::get('/doner-register','DonerController@register')->name('doner-register');
Route::post('/doner-register','DonerController@registerPost')->name('doner-register');
// bene
Route::get('/bene-register','BeneController@register')->name('bene-register');
Route::post('/bene-register','BeneController@registerPost')->name('bene-register');


// users login
Route::get('/login','UsersController@login')->name('login');
Route::post('/login',[
    'uses' => 'UsersController@loginPost',
    'as' => 'login.user'
]);
// doners login
Route::get('/doner-login','DonerController@login')->name('login.doner');
Route::post('/doner-login',[
    'uses' => 'DonerController@loginPost',
    'as' => 'login.doner'
]);

// benes login
Route::get('/bene-login','BeneController@login')->name('login.bene');
Route::post('/bene-login',[
    'uses' => 'BeneController@loginPost',
    'as' => 'login.bene'
]);


Route::get('/admin-login','AdminController@login');
Route::post('/admin-login',[
    'uses' => 'AdminController@loginPost',
    'as' => 'login.admin'
]);


Route::get('admind', [
    'middleware' => 'admin',
    'uses' => function(){
        echo var_dump(Auth::guard('admin')->user());
        echo 'admin panel';
    }
]);

Route::get('donerd', [
    'middleware' => 'doner',
    'uses' => function(){
        echo var_dump(Auth::guard('doner')->user());
        echo 'doner panel';
    }
]);

Route::get('bened', [
    'middleware' => 'bene',
    'uses' => function(){
        echo var_dump(Auth::guard('bene')->user());
        echo 'bene panel';
    }
]);

Route::get('userd', [
    'middleware' => 'auth',
    'uses' => function(){
        echo var_dump(Auth::user());
        echo 'user panel';
    }
]);

Route::post('/logout', function(){
    Auth::guard('bene')->logout();
    Auth::guard('doner')->logout();
    Auth::guard('admin')->logout();
    Auth::logout();
    return redirect('/admin-login');
})->name('logout');

Route::get('/logout', function(){
    Auth::guard('bene')->logout();
    Auth::guard('doner')->logout();
    Auth::guard('admin')->logout();
    Auth::logout();
    return redirect('/admin-login');
})->name('logout');

?>