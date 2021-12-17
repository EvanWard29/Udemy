<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;

use App\Todo;

class TodosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = Todo::orderBy('due', 'asc')->get();

        $phpLocale = 'en-GB';
        $carbonLocale = '14';

        $browserLocale = 0;

        $localePreferences = explode(",",$_SERVER['HTTP_ACCEPT_LANGUAGE']);
        if(is_array($localePreferences) && count($localePreferences) > 0) {
            $browserLocale = $localePreferences[0];
        }

        return view('todos.index', compact('todos', 'phpLocale', 'carbonLocale', 'browserLocale'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $timezones = \DateTimeZone::listIdentifiers(\DateTimeZone::ALL);

        return view('todos.create', compact('timezones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'text' => 'required'
        ]);

        Todo::create(['text'=>$request->text, 'body'=>$request->body, 'due'=>$request->date.' '.$request->time]);

        return redirect(route('todo.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $todo = Todo::findOrFail($id);

        $twelve_hour_format = true; //Auth::user()->twelve_hour_format;

        $date_12 = null;
        $date_24 = null;

        $localePreferences = explode(",",$_SERVER['HTTP_ACCEPT_LANGUAGE']);
        if(is_array($localePreferences) && count($localePreferences) > 0) {
            $browserLocale = $localePreferences[0];
            
            setLocale(LC_TIME, $browserLocale); //Set PHP's locale to browser's preffered

            /* Carbon 1 has limited locale options, and doesn't support region specific, only the base locale. Eg. it supports 'fr' but not 'fr-FR' */
            //Get base locale of browser's preffered locale and set that to Carbon's locale
            Carbon::setLocale(substr($browserLocale, 0, 2));

            if($browserLocale == "en-GB"){
                //Return UK format
                if($twelve_hour_format == true){
                    //If user has 12-hour format selected
                    $date_12 = Carbon::parse($todo->due)->formatLocalized('%d-%m-%Y %I:%M %p'); //12-Hour Format
                }else{
                    //Otherwise shwo 24-hour format
                    $date_24 = Carbon::parse($todo->due)->formatLocalized('%d-%m-%Y %H:%M'); //24-Hour Format
                }
            }else if($browserLocale == "en-US"){
                //Return US format
                if($twelve_hour_format == true){
                    //If user has 12-hour format selected
                    $date_12 = Carbon::parse($todo->due)->formatLocalized('%m-%d-%Y %I:%M %p'); //12-Hour Format
                }else{
                    //Otherwise shwo 24-hour format
                    $date_24 = Carbon::parse($todo->due)->formatLocalized('%m-%d-%Y %H:%M'); //24-Hour Format
                }
            }else{
                //Return a default format
                $date_12 = Carbon::parse($todo->due)->formatLocalized('%d-%m-%Y %I:%M %p'); //UK Date & 12-Hour Format As Default
                $date_24 = Carbon::parse($todo->due)->formatLocalized('%d-%m-%Y %H:%M'); //UK Date & 24-Hour Format As Default
            }
        }

        $diff_browserLocale = Carbon::parse($todo->due)->diffForHumans();

        $date_local = Carbon::parse($todo->due)->formatLocalized('%A %d %B %Y');        

        return view("todos.show", compact('todo', 'date_12', 'date_24', 'diff_browserLocale', 'date_local'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = Todo::find($id);

        explode(' ', $todo->due);

        return view('todos.edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Todo::find($id)->update(['text'=>$request->text, 'body'=>$request->body, 'due'=>$request->date.' '.$request->time]);

        return redirect(route('todo.index'))->with('success', 'Task Successfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Todo::find($id)->delete();

        return redirect(route('todo.index'))->with('success', 'Task Successfully Removed!');
    }

    public function locale(Request $request){
        $todos = Todo::orderBy('due', 'asc')->get();

        $phpLocale = $request->phpLocale;
        $carbonLocale = $request->carbonLocale;

        $browserLocale = str_replace('_', '-', $request->getPreferredLanguage());

        return view('todos.index', compact('todos', 'phpLocale', 'carbonLocale', 'browserLocale'));
    }

    public function testFormatting(){
        return view('testFormatting');
    }

    public function format(Request $request){
        $date = $request->date . $request->time;
        $locale = $request->locale;
        $isTwelveHour = $request->twelveHour;

        return $this->formatDate($date, $locale, $isTwelveHour);
    }

    function formatDate($date, $locale = 'en_GB', $isTwelveHour = false){
        //Carbon 1 only supports the base locale. Eg. 'en' rather than 'en_US'
        $carbonLocale = explode('_', $locale)[0];

        //Set locale to use
        setLocale(LC_TIME, $carbonLocale);
        Carbon::setLocale($carbonLocale);

        Carbon::setUtf8(true); //Enable UTF-8 Characters for Carbon

        if($locale == "en_US"){
            //Use US Format
            if($isTwelveHour){
                //Return 12-Hour Format
                $formattedDate = Carbon::parse($date)->formatLocalized('%m-%d-%Y %I:%M %p');
            }else{
                //Return Default 24-Hour Format
                $formattedDate = Carbon::parse($date)->formatLocalized('%m-%d-%Y %H:%M');
            }
        }else{
            //Use defualt UK format
            if($isTwelveHour){
                //Return 12-Hour Format
                $formattedDate = Carbon::parse($date)->formatLocalized('%d-%m-%Y %I:%M %p');

                //Check if locale supports AM/PM in it's correct language
                if($formattedDate[strlen($formattedDate)-1] == " "){
                    //locale doesn't support AM/PM in it's correct language - use English default 'AM/PM'.
                    setLocale(LC_TIME, 'en');
                    Carbon::setLocale('en');

                    $formattedDate = Carbon::parse($date)->formatLocalized('%d-%m-%Y %I:%M %p');
                }
            }else{
                //Return Default 24-Hour Format
                $formattedDate = Carbon::parse($date)->formatLocalized('%d-%m-%Y %H:%M');
            }
        }

        return $formattedDate;
    }
}
