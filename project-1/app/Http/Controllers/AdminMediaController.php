<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;

class AdminMediaController extends Controller
{
    public function index(){
        $photos = Photo::all();

        return view('admin.media.index', compact('photos'));
    }

    public function store(Request $request){
        $file = $request->file('photo_id');

        $name = time() . $file->getClientOriginalName();

        $file->move('images', $name);

        Photo::create(['file'=>$name]);

        return redirect('/admin/media');
    }

    public function create(){
        return view('admin.media.create');
    }

    public function destroy($id){
        $photo = Photo::findOrFail($id);

        unlink(public_path() . $photo->file);

        $photo->delete();

        return redirect('/admin/media');
    }
}
