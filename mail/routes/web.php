<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

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
    $data = [
        'title' => 'Email Title',
        'content' => 'This is the Email Content'
    ];

    Mail::send('emails.test', $data, function($message){
        $message->to('Evan29Ward@gmail.com', 'Evan')->subject("This is the Subject"); //Hardcoding inputs

    });
});