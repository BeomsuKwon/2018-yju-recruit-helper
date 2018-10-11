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

// Vue Access Point
Route::get('/', function () {
    return view('welcome');
});
// Vue Access Point End

// Authentication
Route::group(['namespace' => 'Auth'], function() 
{
    Route::post('/login', 'LoginController@login')->name('login');
    Route::post('/logout', 'LoginController@logout')->name('logout');
    Route::post('/password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password-email');
    Route::post('/password/reset', 'ForgotPasswordController@reset')->name('password-reset');
    Route::post('/register', 'RegisterController@register')->name('register');
});
// Authentication end