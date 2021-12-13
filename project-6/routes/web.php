<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'AlbumsController@index');
Route::get('/albums', 'AlbumsController@index')->name('albums');
Route::get('/albums/create', 'AlbumsController@create')->name('create');
Route::get('/albums/{id}', 'AlbumsController@show')->name('show_album');

Route::post('/albums/store', 'AlbumsController@store');

Route::get('/photos/create/{id}', 'PhotosController@create')->name('upload');
Route::get('/photos/{id}', 'PhotosController@show')->name('show_photo');
Route::delete('/photos/{id}', 'PhotosController@destroy');

Route::post('/photos/store', 'PhotosController@store');
