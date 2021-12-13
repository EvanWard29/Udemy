@extends('layouts.app')

@section('content')
    <h1>Create Album</h1>
    @include('includes.form_error')
    {!! Form::open(['method'=>'POST', 'action'=>'AlbumsController@store', 'files'=>true]) !!}
        <div class='form-group'>
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>
        <div class='form-group'>
            {!! Form::label('description', 'Description:') !!}
            {!! Form::textarea('description', null, ['class'=>'form-control', 'rows'=>3]) !!}
        </div>
        <div class='form-group'>
            {!! Form::label('cover_image', 'Cover Image:') !!}
            {!! Form::file('cover_image') !!}
        </div>
        <div class='form-group'>
            {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}
@endsection