@extends('layouts.app')

@section('content')
    <h1>{{$album->name}}</h1>
    <a href="{{route('albums')}}" class="btn btn-secondary">Go Back</a>
    <a class="btn btn-primary" href="{{route('upload', $album->id)}}">Upload Photo To Album</a>
    <hr>
    @if (count($album->photos) > 0)
        <div id="albums">
            @foreach ($album->photos as $photo)
                <div class="row">
                    <div class="col text-center">
                        <br>
                        <a href="{{route('show_photo', $photo->id)}}">
                            <img class="img-thumbnail" src="/project-6/public/storage/photos/{{$album->id}}/{{$photo->photo}}" alt="{{$photo->title}}">
                        </a>
                        <br>
                        
                        <br>
                        <h4>{{$photo->title}}</h4>
                        <br>

                        <hr>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>No Photos To Display</p>
    @endif
@endsection