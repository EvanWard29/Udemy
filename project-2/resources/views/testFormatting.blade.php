@extends('layouts.app')

@section('content')
    @include('includes.locales')
    <div class="container">
        {!! Form::open(['method'=>'POST', 'action'=>'TodosController@format']) !!}
            <div class='form-group'>
                {!! Form::label('date', 'Date:') !!}
                {!! Form::date('date', null, ['class'=>'form-control']) !!}
            </div>
            <div class='form-group'>
                {!! Form::label('time', 'Time:') !!}
                {!! Form::time('time', null, ['class'=>'form-control']) !!}
            </div>
            <div class='form-group'>
                {!! Form::label('locale', 'Locale:') !!}
                {!! Form::select('locale', getPhpLocales(), 'en_GB', ['class'=>'form-control']) !!}
            </div>
            <div class='form-group'>
                {!! Form::label('twelveHour', 'Twelve Hour Format:') !!}
                {!! Form::checkbox('twelveHour') !!}
            </div>
            <div class='form-group'>
                {!! Form::submit('SUBMIT', ['class'=>'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}
    </div>
@endsection