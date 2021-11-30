@extends('layouts.admin')

@section('styles')

@endsection

@section('content')
    <h1>Upload Media</h1>

    {!! Form::open(['method'=>'POST', 'action'=>'AdminMediaController@store', 'files'=>true, 'class'=>'dropzone']) !!}
        <div class="form-group">
            {!! Form::label('photo_id', 'Photo:') !!}
            {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Upload Media', ['class'=>'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}

@endsection

@section('scripts')

@endsection