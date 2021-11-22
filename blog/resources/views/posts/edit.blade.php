@extends('layouts.app')

@section('content')

    <h1>Edit</h1>
    
    {!! Form::model($post, ['method'=>'PATCH', 'action'=>['PostsController@update', $post->id]])!!}
        {{ csrf_field() }}

        <div class="form-group">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['class'=>'form-control']) !!}
        </div>

        {!! Form::submit('Update Post', ['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}

    {!! Form::open(['method'=>'DELETE', 'action'=>['PostsController@destroy', $post->id]]) !!}
        {!! Form::submit('Delete Post', ['class'=>'btn btn-danger']) !!}
    {!! Form::close() !!}

    <!--<form method="post" action="/post/{{$post->id}}">
        <input type="hidden" name="_method" value="PUT">

        <input type="text" name="title" placeholder="Enter Title" value="{{$post->title}}">
        {{ csrf_field() }}
        <input type="submit" name="submit">
    </form>

    <form method="POST" action="/post/{{$post->id}}">
        <input type="hidden" name="_method" value="DELETE">
        {{ csrf_field() }}
        <input type="submit" value="DELETE">
    </form>-->
@endsection