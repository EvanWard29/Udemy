@extends('layouts.blog-post')

@section('content')
    <!-- Blog Post -->

    <!-- Title -->
    <h1>{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
        by <a href="#">{{$post->user->name}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="{{$post->photo->file}}" alt="">

    <hr>

    <!-- Post Content -->
    <p>{{$post->body}}</p>

    <hr>

    @if (Session::has('comment_message'))
        {{session('comment_message')}}
    @endif

    <!-- Blog Comments -->
    @if (Auth::check())
        <!-- Comments Form -->
        <div class="well">
            <h4>Leave a Comment:</h4>
            {!! Form::open(['method'=>'POST', 'action'=>'PostCommentsController@store']) !!}
                <input type="hidden" name="post_id" value="{{$post->id}}">
                <div class='form-group'>
                    {!! Form::label('body', 'Body:') !!}
                    {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>3]) !!}
                </div>
                <div class='form-group'>
                    {!! Form::submit('Submit Comment', ['class'=>'btn btn-primary']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    @endif

    <hr>

    <!-- Posted Comments -->

    @if (count($comments) > 0)
        @foreach ($comments as $comment)
            <!-- Comment -->
            <div class="media">
                <a class="pull-left" href="#">
                    <img height="64" class="media-object" src="{{$comment->photo ? $comment->photo : '/images/placeholder.jpg'}}" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">{{$comment->author}}
                        <small>{{$comment->created_at->format('F j Y\\, H:i:s')}}</small>
                    </h4>
                    <!-- Body -->
                    <p>{{$comment->body}}</p>

                    <div class="comment-reply-container">
                        <button class="toggle-reply btn btn-sm btn-primary pull-right">Reply</button>
                        <div class="comment-reply col-sm-6">
                            <!-- Reply Form -->
                            {!! Form::open(['method'=>'POST', 'action'=>'CommentRepliesController@createReply']) !!}
                                <input type="hidden" name="post_id" value="{{$comment->id}}">
                                <div class='form-group'>
                                    {!! Form::label('body', 'Body:') !!}
                                    {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>1]) !!}
                                </div>
                                <div class='form-group'>
                                    {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
                                </div>
                            {!! Form::close() !!}

                        </div>
                    </div>
                    <!-- End Nested Comment -->

                    @if(count($comment->replies) > 0)
                        @foreach($comment->replies as $reply) 
                            @if ($reply->is_active == 1)
                                <!-- Nested Comment -->
                                <div style="margin-top: 60px" class="media">
                                    <a class="pull-left" href="#">
                                        <img height="64" class="media-object" src="{{$reply->photo ? $reply->photo : '/images/placeholder.jpg'}}" alt="">
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">{{$reply->author}}
                                            <small>{{$reply->created_at->format('F j Y\\, H:i:s')}}</small>
                                        </h4>
                                        <p>{{$reply->body}}</p>
                                    </div>
                                    
                                    <!-- POSSIBLE REPLIES TO COMMENT REPLIES -->
                                    <div style="display: none">
                                        <div class="comment-reply-container">
                                            <button class="toggle-reply btn btn-sm btn-primary pull-right">Reply</button>
                                            <div class="comment-reply col-sm-6">
                                                <!-- Reply Form -->
                                                {!! Form::open(['method'=>'POST', 'action'=>'CommentRepliesController@createReply']) !!}
                                                    <input type="hidden" name="post_id" value="{{$comment->id}}">
                                                    <div class='form-group'>
                                                        {!! Form::label('body', 'Body:') !!}
                                                        {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>1]) !!}
                                                    </div>
                                                    <div class='form-group'>
                                                        {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
                                                    </div>
                                                {!! Form::close() !!}

                                            </div>
                                        </div>
                                        <!-- End Nested Comment -->
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
        @endforeach
    @endif
@endsection

@section('scripts')
    <script>
        $('.comment-reply-container .toggle-reply').click(function(){
            $(this).next().slideToggle('slow');
        });
    </script>
@endsection