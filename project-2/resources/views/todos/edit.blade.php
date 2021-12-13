@extends('layouts.app')

@section('content')
    <h1>Edit Todo</h1>

    {!! Form::model($todo, ['method'=>'PUT', 'action'=>['TodosController@update', $todo->id]]) !!}
        <div class='form-group'>
            {!! Form::label('text', 'Title:') !!}
            {!! Form::text('text', null, ['class'=>'form-control']) !!}
        </div>
        <div class='form-group'>
            {!! Form::label('body', 'Task:') !!}
            {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
        </div>
        <div class='form-group'>
            {!! Form::label('due', 'Due:') !!}
            {!! Form::date('due', null, ['class'=>'form-control']) !!}
        </div>
        <div class='form-group'>
            {!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}
@endsection