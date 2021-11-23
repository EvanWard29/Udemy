<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

/*require 'vendor/autoload.php';
use Mailgun\Mailgun;*/

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

    /*$mgClient = new Mailgun('102dae784b173e9bec0c804901d4d1c1-7dcc6512-9182a6fb');
    $domain = 'sandbox4df493614ab64944ad3eae4c91cf3ac8.mailgun.org';

    $result = $mgClient->sendMessage($domain, array(
        'from' => 'Excited User <mailgun@sandbox4df493614ab64944ad3eae4c91cf3ac8.mailgun.org>'
    ));*/

});