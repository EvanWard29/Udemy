@extends('layouts.todo')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Task</th>
                <th>Created</th>
                <th>Due</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($todos as $todo)
                <tr>
                    <td>{{$todo->id}}</td>
                    <td>{{$todo->title}}</td>
                    <td>{{$todo->content}}</td>
                    <td>{{$todo->created_at->format('j/m/Y - H:m:s')}}</td>
                    <td>{{$todo->due}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a class="btn btn-primary" href="{{route('todos.create')}}">New Todo</a>
@endsection
