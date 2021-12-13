<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewAlbumRequest;
use Illuminate\Http\Request;

use App\Album;

class AlbumsController extends Controller
{
    public function index(){
        $albums = Album::with('Photos')->get();

        return view('albums.index', compact('albums'));
    }

    public function create(){
        return view('albums.create');
    }

    public function store(NewAlbumRequest $request){
        $file = $request->file('cover_image');
        $filename = time() . $file->getClientOriginalName();

        $file->storeAs('public/cover_images', $filename);

        Album::create(['name'=>$request->name, 'description'=>$request->description, 'cover_image'=>$filename]);

        return redirect('/albums');
    }

    public function show($id){
        $album = Album::with('Photos')->find($id);

        return view('albums.show', compact('album'));
    }
}
