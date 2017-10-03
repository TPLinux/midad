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
// comps
Route::get('/comp-register','CompController@register')->name('comp-register');
Route::post('/comp-register','CompController@registerPost')->name('comp-register');

// users login
Route::get('/login','UsersController@login')->name('login');
Route::post('/login',[
    'uses' => 'UsersController@loginPost',
    'as' => 'login.user'
]);
// comps login
Route::get('/comp-login','CompController@login')->name('login.comp');
Route::post('/comp-login',[
    'uses' => 'CompController@loginPost',
    'as' => 'login.comp'
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

Route::get('compd', [
    'middleware' => 'comp',
    'uses' => function(){
        echo var_dump(Auth::guard('comp')->user());
        echo 'Comp panel';
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
    Auth::guard('comp')->logout();
    Auth::guard('admin')->logout();
    Auth::logout();
    return redirect('/admin-login');
})->name('logout');

Route::get('/logout', function(){
    Auth::guard('comp')->logout();
    Auth::guard('admin')->logout();
    Auth::logout();
    return redirect('/admin-login');
})->name('logout');

?>