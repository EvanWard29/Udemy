@extends('layouts.app')

@section('content')
    <h1>Todos</h1>

    <?php
        use Carbon\Carbon;
    ?>
    
    @if (count($todos) > 0)
        @foreach ($todos as $todo)
            <?php $due = new Carbon($todo->due); ?>
            <div class="well">
                <h3><a href="{{route('todo.show', $todo->id)}}">{{$todo->text}}</a> <span class="badge {{$due->lt(new Carbon()) ? 'bg-danger' : 'bg-info'}}">{{$due->diffForHumans()}}</span></h3>
            </div>
        @endforeach
    @endif
@endsection