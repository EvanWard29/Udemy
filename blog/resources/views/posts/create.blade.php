@extends('layouts.app')

@section('content')

    <h1>Create</h1>

    {!! Form::open(['method'=>'POST', 'action'=>'PostsController@store'])!!}
        <div class="form-group">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['class'=>'form-control']) !!}
        </div>

        <!--<input type="text" name="title" placeholder="Enter Title">-->
        {{ csrf_field() }}

        {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}
        <!--<input type="submit" name="submit">-->
    {!! Form::close() !!}

    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

@endsection