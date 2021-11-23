<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;

use App\Post;
use App\User;
use App\Country;
use App\Photo;
use App\Tag;

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
Route::get('/read', function(){
    $posts = Post::all();

    foreach($posts as $post){
        return $post->title;
    }
});

//Get specific record
/*Route::get('/find', function(){
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

//Restoring safe deleted data
/*Route::get('/restore', function(){
    Post::withTrashed()->where('is_admin', 0)->restore();
});*/

//Permenantly deleting data
/*Route::get('/forceDelete', function(){
    Post::onlyTrashed()->where('id', 7)->forceDelete();
});*/

/*
|--------------------------------------------------------------------------
| ELOQUENT RELATIONSHIPS
|--------------------------------------------------------------------------
*/

//One to One Relationship
/*Route::get('/user/{id}/post', function($id){
    return User::find($id)->post;
});*/

//Inverse Relationsip
/*Route::get('/post/{id}/user', function($id){
    return Post::find($id)->user->name;
});*/

//One to Many
/*Route::get('/posts', function(){
    $user = User::find(1);

    foreach($user->posts as $post){
        echo $post->title . "<br>";
    }
});*/

//Many to Many Relationship
/*Route::get('/user/{id}/role', function($id){
    //Alternative option

    //$user = User::find($id);
    //foreach($user->roles as $role){
    //    return $role->name;
    //};

    $user = User::find($id)->roles()->orderBy('id', 'desc')->get();
    return $user;
});

//Accessing the Intermediate/Pivot Table
Route::get('/user/pivot', function(){
    $user = User::find(1);

    foreach($user->roles as $role){
        echo $role->pivot->created_at;
    }
});

//Has Many Through Relation
Route::get('/user/country', function(){
    $country = Country::find(3);

    foreach($country->posts as $post){
        return $post->title;
    }
});*/

//Polymorphic Relation
/*Route::get('/user/photos', function(){
    $user = User::find(1);

    foreach($user->photos as $photo){
        return $photo->path;
    }
});

//Many photos and dynamic selection
Route::get('/post/{id}/photos', function($id){
    $post = Post::find($id);

    foreach($post->photos as $photo){
        echo $photo->path . "<br>";
    }
});*/

//Finding Owner of Photo
/*Route::get('/photo/{id}/post', function($id){
    $photo = Photo::findOrFail($id);

    return $photo->imageable;
});*/

//Many to Many Polymorphic Relationship
/*Route::get('/post/tag', function(){
    $post = Post::find(1);

    foreach($post->tags as $tag){
        echo $tag->name;
    }
});*/

/*Route::get('/tag/post', function(){
    $tag = Tag::find(2);

    foreach($tag->posts as $post){
        echo $post->title;
    }
});*/

/*
|--------------------------------------------------------------------------
| CRUD Application
|--------------------------------------------------------------------------
*/

Route::group(['middleware'=>'web'], function(){
    Route::resource('/post', 'PostsController');
    
    Route::get('/dates', function(){
        //Vanilla PHP
        /*$date = new DateTime('+1 week');
        echo $date->format('d-m-y');*/

        //Carbon
        echo Carbon::now()->addDays(10)->diffForHumans();
        echo "<br>";
        echo Carbon::now()->subMonths(5)->diffForHumans();
        echo "<br>";
        echo Carbon::now()->yesterday()->diffForHumans();
    });

    Route::get('/getname', function(){
        $user = User::find(1);
        echo $user->name;
    });

    Route::get('/setname', function(){
        $user = User::find(1);
        $user->name = "bob";
        $user->save();
    });
});