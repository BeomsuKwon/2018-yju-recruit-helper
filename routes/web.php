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
Route::group(['namespace' => 'Auth', 'prefix' => 'Auth'], function() 
{
    Route::post('/login', 'UserController@login')->name('login');
    Route::post('/logout', 'UserController@logout')->name('logout');
    Route::post('/register', 'UserController@register')->name('register');
});
// Authentication end