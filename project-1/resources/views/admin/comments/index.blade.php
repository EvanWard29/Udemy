@extends('layouts.admin')

@section('content')
    @if (count($comments) > 0)
        <h1>Comments</h1>
        <table class='table'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Author</th>
                    <th>Email</th>
                    <th>Body</th>
                    <th>Date Posted</th>
                    <th>Post</th>
                    <th>Replies</th>
                    <th>Action</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comments as $comment)
                    <tr>
                        <td>{{$comment->id}}</td>
                        <td>{{$comment->author}}</td>
                        <td>{{$comment->email}}</td>
                        <td>{{$comment->body}}</td>
                        <td>{{$comment->created_at}}</td>
                        <td><a href="{{route('home.post', $comment->post->id)}}">View Post</a></td>
                        <td><a href="{{route('replies.show', $comment->id)}}">View Replies</a></td>
                        <td>
                            @if ($comment->is_active == 1)
                                <!-- Remove Comment -->
                                {!! Form::open(['method'=>'PATCH', 'action'=>['PostCommentsController@update', $comment->id]]) !!}
                                    <input type="hidden" name="is_active" value="0">
                                    <div class='form-group'>
                                        {!! Form::submit('Remove Post', ['class'=>'btn btn-warning']) !!}
                                    </div>
                                {!! Form::close() !!}
                            @else
                                <!-- Approve Comment -->
                                {!! Form::open(['method'=>'PATCH', 'action'=>['PostCommentsController@update', $comment->id]]) !!}
                                    <input type="hidden" name="is_active" value="1">
                                    <div class='form-group'>
                                        {!! Form::submit('Approve Post', ['class'=>'btn btn-primary']) !!}
                                    </div>
                                {!! Form::close() !!}
                            @endif
                        </td>
                        <td>
                            <!-- Delete Comment -->
                            {!! Form::open(['method'=>'DELETE', 'action'=>['PostCommentsController@destroy', $comment->id]]) !!}
                            <div class='form-group'>
                                {!! Form::submit('Delete Post', ['class'=>'btn btn-danger']) !!}
                            </div>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h1 class="text-center">No Comments</h1>
    @endif
@endsection