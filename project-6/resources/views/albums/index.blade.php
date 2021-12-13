@extends('layouts.app')

@section('content')
    <h3>Albums</h3>
    @if (count($albums) > 0)
        <div id="albums">
            @foreach ($albums as $album)
                <div class="row">
                    <div class="col text-center">
                        <br>
                        <a href="{{route('show_album', $album->id)}}">
                            <img class="img-thumbnail" src="/project-6/public/storage/cover_images/{{$album->cover_image}}" alt="{{$album->name}}">
                        </a>
                        <br>
                        
                        <br>
                        <h4>{{$album->name}}</h4>
                        <br>

                        <hr>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>No Albums To Display</p>
    @endif
@endsection