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
            {!! Form::label('date', 'Date:') !!}
            {!! Form::date('date', explode(' ', $todo->due)[0], ['class'=>'form-control']) !!}
        </div>
        <div class='form-group'>
            {!! Form::label('time', 'Time:') !!}
            {!! Form::time('time', explode(' ', $todo->due)[1], ['class'=>'form-control']) !!}
        </div>
        <div class='form-group'>
            {!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}
@endsection