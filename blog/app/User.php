<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //Look for first userID in posts table
    public function post(){
        return $this->hasOne('App\Post');
    }

    //Get all posts
    public function posts(){
        return $this->hasMany('App\Post');
    }

    //Get all roles
    public function roles(){
        return $this->belongsToMany('App\Role')->withPivot('created_at'); //'withPivot()' needed to access pivot data

        //To customise tables name and columns follow the format below:
        //return $this->belongsToMany('App\Role', 'user_roles', 'user_id', 'role_id');
    }

    public function photos(){
        return $this->morphMany('App\Photo', 'imageable');
    }

    public function getNameAttribute($value){
        return strtoupper($value);
    }

    public function setNameAttribute($value){
        $this->attributes['name'] = strtoupper($value);
    }
}
