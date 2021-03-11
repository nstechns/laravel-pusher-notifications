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

Route::get('/test', function () {
   $user = Auth::guard('admin')->user();
   foreach ($user->unreadNotifications as $noti) {
   	echo $noti->notifiable_id.'<br>';
   }

});


Route::get('/', function () {
    return view('welcome');
});


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');
Route::post('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');


Route::prefix('admin')->group(function(){
Route::get('/register', 'Auth\AdminRegisterController@showRegistrationForm')->name('admin.register');
Route::post('/register', 'Auth\AdminRegisterController@register')->name('admin.register');
Route::get('/', 'AdminController@index')->name('admin.dashboard');
Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');

Route::get('/markasread',function(){
	$_admin = Auth::guard('admin')->user();
	$_admin->unreadNotifications->markAsRead();
});

    Route::get('/user/profile/{user_id}', 'HomeController@profile')->name('admin.user.profile');

});
