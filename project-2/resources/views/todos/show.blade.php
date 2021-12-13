@extends('layouts.app')

@section('content')
    <?php
        use Carbon\Carbon;

        $due = new Carbon($todo->due);
    ?>
    <a href="{{route('todo.index')}}" class="btn btn-default">Go Back</a>

    <h1>{{$todo->text}}</h1>
    <div class="badge {{$due->lt(new Carbon()) ? 'bg-danger' : 'bg-info'}}">{{$due->diffForHumans()}}</div>
        
    <hr>

    <p>{{$todo->body}}</p>

    <a href="{{route('todo.edit', $todo->id)}}" class="btn btn-primary">Edit</a>
    
    {!! Form::open(['method'=>'DELETE', 'class'=>'pull-right', 'action'=> ['TodosController@destroy', $todo->id]]) !!}
        <div class='form-group'>
            {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
        </div>
    {!! Form::close() !!}

@endsection