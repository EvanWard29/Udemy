<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        return view('todos.index', compact('todos', 'phpLocale', 'carbonLocale'));
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

        return view("todos.show", compact('todo'));
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
        Todo::find($id)->update($request->all());

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

        //return $request->getPreferredLanguage(); //Get user's locale/preferredLanguage from HTTP request

        return view('todos.index', compact('todos', 'phpLocale', 'carbonLocale'));
    }
}
