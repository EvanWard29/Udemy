@extends('layouts.admin')



@section('content')

    @if(Session::has('deleted_user'))

        <p class="bg-danger">{{session('deleted_user')}}</p>

    @endif

    <h1>Users</h1>

    <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th>Created</th>
            <th>Updated</th>
          </tr>
        </thead>
        <tbody>
            @if($users)
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td><img height="50" src="{{$user->photo ? $user->photo->file : '/images/placeholder.jpg'}}"></td>
                        <td><a href="{{route('users.edit', $user->id)}}">{{$user->name}}</a></td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role->name}}</td>
                        @if($user->is_active == 1)
                            <td>Active</td>
                        @else
                            <td>Inactive</td>
                        @endif
                        <td>{{$user->created_at->diffForHumans()}}</td> <!-- Using Carbon to format dates -->
                        <td>{{$user->updated_at->diffForHumans()}}</td> <!-- Unformated dates -->
                    </tr>
                @endforeach
            @endif
        </tbody>
      </table>
@stop