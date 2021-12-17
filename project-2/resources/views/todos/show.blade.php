@extends('layouts.app')

@section('content')
    <?php use Carbon\Carbon; $due = Carbon::parse($todo->due); ?>
    <a href="{{route('todo.index')}}" class="btn btn-default">Go Back</a>

    <h1>{{$todo->text}}</h1>
    <div class="badge {{$due->lt(new Carbon()) ? 'bg-danger' : 'bg-info'}}">{{$diff_browserLocale}}</div>
    <div class="badge bg-primary">{{$date_local}}</div>

    <!-- Date in US or UK format sent from server -->
    <div class="badge {{$due->lt(new Carbon()) ? 'bg-danger' : 'bg-info'}}">{{$date_12}}</div>

    <!-- Date in US or UK format sent from server -->
    <div class="badge {{$due->lt(new Carbon()) ? 'bg-danger' : 'bg-info'}}">{{$date_24}}</div>
        
    <hr>

    <p>{{$todo->body}}</p>

    <a href="{{route('todo.edit', $todo->id)}}" class="btn btn-primary">Edit</a>
    
    {!! Form::open(['method'=>'DELETE', 'class'=>'pull-right', 'action'=> ['TodosController@destroy', $todo->id]]) !!}
        <div class='form-group'>
            {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
        </div>
    {!! Form::close() !!}

@endsection