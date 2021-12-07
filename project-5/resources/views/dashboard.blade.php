@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard<a href="{{route('listings.create')}}" style="float:right" class="btn btn-primary btn-xs">Create Listing</a></div>
                
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3>Your Listings</h3>
                    @if (count($listings))
                        <table class='table table-striped'>
                            <thead>
                                <tr>
                                    <th>Company</th>
                                    <th>Address</th>
                                    <th>Website</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>About</th>
                                    <th>Created</th>
                                    <th>Updated</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($listings as $listing)
                                    <tr>
                                        <td>{{$listing->name}}</td>
                                        <td>{{$listing->address}}</td>
                                        <td><a href="{{$listing->website}}">{{$listing->website}}</a></td>
                                        <td>{{$listing->email}}</td>
                                        <td>{{$listing->phone}}</td>
                                        <td>{{$listing->bio}}</td>
                                        <td>{{$listing->created_at}}</td>
                                        <td>{{$listing->updated_at}}</td>
                                        <td><a class="btn btn-warning btn-xs" href="{{route('listings.edit', $listing->id)}}">Edit</a></td>
                                        <td>
                                            {!! Form::open(['method'=>'DELETE', 'action'=>['ListingsController@destroy', $listing->id]]) !!}
                                                <div class='form-group'>
                                                    {!! Form::submit('Delete', ['class'=>'btn btn-danger btn-xs']) !!}
                                                </div>
                                            {!! Form::close() !!}
                                    </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
