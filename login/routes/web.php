<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    //return view('welcome');

    //Check if user is logged in
    /*if(Auth::check()){
        return "The user is logged in!";
    }*/

    //Login Attempt
    /*$username = 'dfsdfsd';
    $password = 'dasdsad';
    if(Auth::attempt(['username'=>$username, 'password'=>$password])){
        return redirect()->intended();
    }*/

    Auth::logout(); //Logout
});

Auth::routes(); //Creates a bunch of usful routes for performing login/registration operations

Route::get('/home', 'HomeController@index')->name('home');
