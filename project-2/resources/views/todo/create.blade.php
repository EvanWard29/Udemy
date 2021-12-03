@extends('layouts.todo')


@section('content')
    {!! Form::open(['method'=>'POST', 'action'=>'TodosController@store']) !!}
        <div class='form-group'>
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['class'=>'form-control']) !!}
        </div>
        <div class='form-group'>
            {!! Form::label('content', 'Task:') !!}
            {!! Form::textarea('content', null, ['class'=>'form-control', 'rows'=>3]) !!}
        </div>
        <div class='form-group'>
            {!! Form::label('content', 'Task:') !!}
            {!! Form::date('due', null, ['class'=>'form-control']) !!}
        </div>
        <div class='form-group'>
            {!! Form::submit('Add Task', ['class'=>'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}
@endsection