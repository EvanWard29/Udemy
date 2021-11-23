<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$request->session()->put(['Evan'=>'student']); //Local session
        //session(['Edwin'=>'teacher']); //Global session

        //echo $request->session()->get('Evan'); //Return specific session using defined key

        //$request->session()->forget('Edwin'); //Remove specific session
        //$request->session()->flush(); //Remove all sessions

        //return $request->session()->all(); //Return all sessions stored

        //$request->session()->flash('message', 'Post has been created'); //Lasts only a couple of requests until removed
        
        //$request->session()->reflash(); //Keeps flashed sessions a little longer

        //$request->session()->keep('message'); //Saves flashed sessions

        return $request->session()->get('message');

        //return view('home');
    }
}
