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


Route::get('/','IndexController@index')->name('index');

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

/*
 * #**********NOTE************#
 * # these is testing routes  #
 * # we will generate         #
 * # fucntions for thiese     #
 * # routes                   #
 * #**************************#
 */
Route::get('admind', [
    'middleware' => 'admin',
    'uses' => function(){
        $admin = Auth::guard('admin')->user();
        echo '<h2>Admin panel</h2>';
        echo "Your email is: " . $admin->admin_email;
        echo "<br/>";
        echo '<a href="'. route('logout') .'">Logout</a>';
    }
]);

Route::get('compd', [
    'middleware' => 'comp',
    'uses' => function(){
        $comp = Auth::guard('comp')->user();
        echo '<h2>Comp panel</h2>';
        echo "Your email is: " . $comp->comp_email;
        echo "<br/>";
        echo '<a href="'. route('logout') .'">Logout</a>';
    }
])->name('compd');

Route::get('userd', [
    'middleware' => 'auth',
    'uses' => function(){
        $user = Auth::user();
        echo '<h2>User panel</h2>';
        echo "Your email is: " . $user->u_email;
        echo "<br/>";
        echo '<a href="'. route('logout') .'">Logout</a>';
    }
])->name('userd');

Route::post('/logout', function(){
    Auth::guard('comp')->logout();
    Auth::guard('admin')->logout();
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::get('/logout', function(){
    Auth::guard('comp')->logout();
    Auth::guard('admin')->logout();
    Auth::logout();
    return redirect('/');
})->name('logout');

?>