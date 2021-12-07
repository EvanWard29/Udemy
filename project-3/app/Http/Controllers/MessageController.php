<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Message;
use App\User;

class MessageController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $messages = Message::with('userFrom')->where('user_id_to', Auth::id())->notDeleted()->get();

        return view('home', compact('messages'));
    }

    public function create(int $id = 0, String $subject = ""){
        if ($id == 0){
            $users = User::where('id', '!=', Auth::id())->pluck('email', 'id');
        } else{
            $users = User::where('id', $id)->pluck('email', 'id');
        }

        if($subject != ""){
            $subject = 'Re: ' . $subject;
        }

        return view('create', compact('users', 'subject'));
    }

    public function send(Request $request){
        $this->validate($request, [
            'subject' => 'required',
            'message' => 'required',
        ]);

        $message = new Message();
        $message->user_id_from = Auth::id();
        $message->user_id_to = $request->input('to');
        $message->subject = $request->input('subject');
        $message->body = $request->input('message');

        $message->save();

        return redirect()->to('/home')->with('status', 'Message sent successfully!');
    }

    public function sent(){
        $messages = Message::with('userTo')->where('user_id_from', Auth::id())->orderBy('created_at', 'desc')->get();

        return view('sent')->with('messages', $messages); //Alternative to 'compact'
    }

    public function read(int $id){
        $message = Message::with('userFrom')->find($id);
        $message->read = true;
        $message->save();

        return view('read')->with('message', $message);
    }

    public function delete(int $id){
        $message = Message::find($id);
        
        $message->deleted = true;

        $message->save();

        return redirect()->to('/home')->with('status', 'Message deleted successfully!');
    }

    public function deleted(){
        $messages = Message::with('userFrom')->where('user_id_to', Auth::id())->deleted()->get();

        return view('deleted', compact('messages'));
    }

    public function restore(int $id){
        $message = Message::find($id);
        
        $message->deleted = false;

        $message->save();

        return redirect()->to('/home');
    }
}
