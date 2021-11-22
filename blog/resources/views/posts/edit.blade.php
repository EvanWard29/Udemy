@extends('layouts.app')

@section('content')

    <h1>Edit</h1>
    <form method="post" action="/post/{{$post->id}}">
        <input type="hidden" name="_method" value="PUT">

        <input type="text" name="title" placeholder="Enter Title" value="{{$post->title}}">
        {{ csrf_field() }}
        <input type="submit" name="submit">
    </form>

    <form method="POST" action="/post/{{$post->id}}">
        <input type="hidden" name="_method" value="DELETE">
        {{ csrf_field() }}
        <input type="submit" value="DELETE">
    </form>
@endsection