@extends('layouts.app')

@section('content')
    <h1>Upload Photo</h1>
    {!! Form::open(['method'=>'POST', 'action'=>'PhotosController@store', 'files'=>true]) !!}
        <input name="album_id" type="hidden" value="{{$album_id}}">
        <div class='form-group'>
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['class'=>'form-control']) !!}
        </div>
        <div class='form-group'>
            {!! Form::label('description', 'Description:') !!}
            {!! Form::textarea('description', null, ['class'=>'form-control', 'rows'=>3]) !!}
        </div>
        <div class='form-group'>
            {!! Form::label('photo', 'Upload Photo:') !!}
            {!! Form::file('photo', null, ['class'=>'form-control']) !!}
        </div>
        <div class='form-group'>
            {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}
@endsection