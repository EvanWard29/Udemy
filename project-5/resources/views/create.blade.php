@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create Listing</div>
                    
                    <div class="panel-body">
                        @include('includes.form_error')
                        {!! Form::open(['method'=>'POST', 'action'=>'ListingsController@store']) !!}
                            <div class='form-group'>
                                {!! Form::label('name', 'Company Name:') !!}
                                {!! Form::text('name', null, ['class'=>'form-control']) !!}
                            </div>
                            <div class='form-group'>
                                {!! Form::label('website', 'Website:') !!}
                                {!! Form::text('website', null, ['class'=>'form-control']) !!}
                            </div>
                            <div class='form-group'>
                                {!! Form::label('email', 'Email:') !!}
                                {!! Form::email('email', null, ['class'=>'form-control']) !!}
                            </div>
                            <div class='form-group'>
                                {!! Form::label('phone', 'Phone:') !!}
                                {!! Form::text('phone', null, ['class'=>'form-control']) !!}
                            </div>
                            <div class='form-group'>
                                {!! Form::label('address', 'Address:') !!}
                                {!! Form::textarea('address', null, ['class'=>'form-control', 'rows' => 3]) !!}
                            </div>
                            <div class='form-group'>
                                {!! Form::label('bio', 'About:') !!}
                                {!! Form::textarea('bio', null, ['class'=>'form-control']) !!}
                            </div>
                            <div class='form-group'>
                                {!! Form::submit('Add Listing', ['class'=>'btn btn-primary']) !!}
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection