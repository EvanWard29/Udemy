@extends('layouts.app')

@section('content')

<h1>Create</h1>

<form method="post" action="/post">
    <input type="text" name="title" placeholder="Enter Title">
    {{ csrf_field() }}
    <input type="submit" name="submit">
</form>

@endsection