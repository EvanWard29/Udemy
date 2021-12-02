@extends('layouts.admin')

@section('content')

    <h1>Posts</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Post ID</th>
                <th>Photo</th>
                <th>User</th>
                <th>Category</th>
                <th>Title</th>
                <th>Body</th>
                <th>Post</th>
                <th>Comments</th>
                <th>Created</th>
                <th>Updated</th>
            </tr>
        </thead>
        <tbody>
            @if($posts)
                @foreach($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td><img height="50" src="{{$post->photo ? $post->photo->file : 'http://placehold.jp/400x400.png'}}" alt=""></td>
                        <td><a href="{{route('posts.edit', $post->id)}}">{{$post->user->name}}</a></td>
                        <td>{{$post->category ? $post->category->name : 'Uncategorised'}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->body}}</td>
                        <td><a href="{{route('home.post', $post->id)}}">View Post</a></td>
                        <td><a href="{{route('comments.show', $post->id)}}">View Comments</a></td>
                        <td>{{$post->created_at->diffForHumans()}}</td>
                        <td>{{$post->updated_at->diffForHumans()}}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
@stop