@extends('layouts.app')

@section('content')

    <ul>
        @foreach($posts as $post)
            <li><a href="{{route('post.show', $post->id)}}">{{$post->title}}</a></li>
        @endforeach
    </ul>

@endsection