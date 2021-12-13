<?php

namespace App\Http\Controllers;
use App\Http\Requests\NewPhotoRequest;
use App\Photo;

use Illuminate\Http\Request;

class PhotosController extends Controller
{
    public function create($album_id){
        return view('photos.create', compact('album_id'));
    }

    public function store(NewPhotoRequest $request){
        $file = $request->file('photo');
        $filename = time() . $file->getClientOriginalName();

        $file->storeAs('public/photos/' . $request->album_id, $filename);

        Photo::create(['album_id'=>$request->album_id, 'title'=>$request->title, 'size'=>$file->getClientSize(), 'description'=>$request->description, 'photo'=>$filename]);

        return redirect('/albums/' . $request->album_id);
    }

    public function show($id){
        $photo = Photo::find($id);

        return view('photos.show', compact('photo'));
    }

    public function destroy($id){
        $photo = Photo::find($id);

        $album_id = $photo->album_id;

        unlink(public_path() . '/storage/photos/' . $album_id . '/' . $photo->photo);

        $photo->delete();

        return redirect('/albums/' . $album_id);
    }
}
