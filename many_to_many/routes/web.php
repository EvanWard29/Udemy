<?php

use Illuminate\Support\Facades\Route;

use App\User;
use App\Role;

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

Route::get('/create', function(){
    $user = User::findOrFail(1);

    $user->roles()->save(new Role(['name'=>'Admin']));
});

Route::get('/read', function(){
    $user = User::findOrFail(1);

    foreach($user->roles as $role){
        echo $role->name . "<br>";
    }
});

Route::get('/update', function(){
    $user = User::findOrFail(1);

    if($user->roles != null){
        foreach($user->roles as $role){
            if($role->name == 'Admin'){
                $role->name = 'administrator';
                $role->save();
            }
        }
    }
});

Route::get('/delete', function(){
    $user = User::findOrFail(1);

    foreach($user->roles as $role){
        $role->where('id', 2)->delete();
    }
});

Route::get('/attach', function(){
    $user = User::findOrFail(1);

    $user->roles()->attach(3);
});

Route::get('/detach', function(){
    $user = User::findOrFail(1);

    $user->roles()->detach(3);
});

Route::get('/sync', function(){
    $user = User::findOrFail(1);

    $user->roles()->sync([1,2]);
});