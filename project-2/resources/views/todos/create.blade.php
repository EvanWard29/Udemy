@extends('layouts.app')

@section('content')
    <h1>Create Todo</h1>

    {!! Form::open(['method'=>'POST', 'action'=>'TodosController@store']) !!}
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
            {!! Form::submit('Create', ['class'=>'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}
@endsection

@section('javascript')
    
@endsection