<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Post;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

//Using Controllers
//Route::get('/post/{id}', 'PostsController@index');

//Route::resource('posts', 'PostsController');

//Route::get('/contact', 'PostsController@contact');

//Route::get('post/{id}/{name}', 'PostsController@showPost');

//Basic GET Calls
/*Route::get('/about', function () {
    return "ABOUT PAGE";
});

Route::get('/contact', function () {
    return "CONTACT";
});

Route::get('/post/{id}/{name}', function ($id, $name) {
    return "This is post number " . $id . " " . $name;
});

//Naming URLs
Route::get('admin/posts/example', array('as'=>'admin.home', function () {
    $url = route('admin.home');

    return "This url is " . $url;
}));*/

/*
|--------------------------------------------------------------------------
| DATABASE Raw SQL Queries
|--------------------------------------------------------------------------
*/

//Inserting Data
Route::get('/insert', function () {
    DB::insert('insert into posts(title, content) values(?, ?)', ['PHP With Laravel', 'Laravel is the best thing that has happened to PHP']);
});

//Fetching Data
/*Route::get('/read', function(){
    $results = DB::select('SELECT * FROM posts WHERE id = ?', [1]);
    
    foreach($results as $item){
        return $item->title;
    }
});*/

//Updating Tables
/*Route::get('/update', function(){
    $updated = DB::update('UPDATE posts SET title = "Update Title" WHERE id = ?', [1]);

    return $updated;
});*/

//Deleting Data
/*Route::get('/delete', function(){
    $delete = DB::delete("DELETE FROM posts WHERE id = ?", [1]);

    return $delete;
});*/

/*
|--------------------------------------------------------------------------
| ELOQUENT
|--------------------------------------------------------------------------
*/

//Get all data
/*Route::get('/read', function(){
    $posts = Post::all();

    foreach($posts as $post){
        return $post->title;
    }
});

//Get specific record
Route::get('/find', function(){
    $post = Post::find(2);

    return $post->title;
});*/

//Using chaining
/*Route::get('/findWhere', function(){
    $posts = Post::where('id', 2)->orderBy('id', 'desc')->take(1)->get();

    return $posts;
});

//Working with errors
Route::get('findMore', function(){
    //$posts = Post::findOrFail(1);
    //return $posts;

    $posts = Post::where('users_count', '<', 50)->firstOrFail();

    return $posts;
});*/

//Using Eloquent to insert data
/*Route::get('/basicInsert', function(){
    $post = new Post;
    
    $post->title = 'New ORM Title';
    $post->content = 'WOOOOOOOOOOOOOOOOOOW';

    $post->save();
});*/

//Using Eloquent to find and update data
/*Route::get('/basicInsert2', function(){
    $post = Post::find(2);
    
    $post->title = 'PHP Title Woooooooo';
    $post->content = 'WOOOOOOOOOOOOOOOOOOW';

    $post->save();
});*/

//Using Mass Assignment
/*Route::get('create', function(){
    Post::create(['title'=>'The Create Method', 'content'=>'Learning Eloquent']);
});*/

//Updating specific records
/*Route::get('/update', function(){
    Post::where('id', 2)->where('is_admin', 0)->update(['title'=>'New PHP Title', 'content'=>'This is the Content']);
});*/

//Delete
/*Route::get('/delete', function(){
    $post = Post::find(2);
    $post->delete();
});*/

//Alternative Delete
/*Route::get('delete2', function(){
    Post::destroy(3); //Single record
    Post::destroy([4,5]); //Multi Delete
});*/

//Soft Delete Record
/*Route::get('/softDelete', function(){
    Post::find(7)->delete();
});*/

//Retreive Soft Deleted Records
/*Route::get('readSoftDelete', function(){
    //$post = Post::withTrashed()->where('id', 6)->get(); //Retreive trashed data

    //$post = Post::onlyTrashed()->where('id', 6)->get();

    $post = Post::onlyTrashed()->get(); //Gets all trashed data

    return $post;
});*/

/*Route::get('/restore', function(){
    Post::withTrashed()->where('is_admin', 0)->restore();
});*/

Route::get('/forceDelete', function(){
    Post::onlyTrashed()->where('id', 7)->forceDelete();
});