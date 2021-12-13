@extends('layouts.app')

@section('content')
    <h3>{{$photo->title}}</h3>
    <p>{{$photo->description}}</p>
    <a href="{{route('show_album', $photo->album_id)}}" class="btn btn-secondary">Go Back</a>

    <hr>

    <div class="container">
        <img width="100%" src="/project-6/public/storage/photos/{{$photo->album_id}}/{{$photo->photo}}" alt="{{$photo->title}}">
    </div>
    <br><br>

    {!! Form::open(['method'=>'DELETE', 'action'=>['PhotosController@destroy', $photo->id]]) !!}
        <div class='form-group'>
            {!! Form::submit('Delete Photo', ['class'=>'btn btn-danger']) !!}
        </div>
    {!! Form::close() !!}

    <hr>

    <small>Size: {{$photo->size}}kb</small>
@endsection