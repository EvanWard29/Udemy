@extends('layouts.app')

@section('content')
    {!! Form::open(['method'=>'POST', 'action'=>'MessageController@send']) !!}
        <div class='form-group'>
            {!! Form::label('to', 'To:') !!}
            {!! Form::select('to', $users, null, ['class' => 'form-control']) !!}
        </div>
        <div class='form-group'>
            {!! Form::label('subject', 'Subject:') !!}
            {!! Form::text('subject', $subject, ['class'=>'form-control']) !!}
        </div>
        <div class='form-group'>
            {!! Form::label('message', 'Message:') !!}
            {!! Form::textarea('message', null, ['class'=>'form-control', 'rows'=> 3]) !!}
        </div>
        <div class='form-group'>
            {!! Form::submit('SUBMIT', ['class'=>'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}
@endsection