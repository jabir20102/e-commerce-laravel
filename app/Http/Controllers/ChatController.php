<?php

namespace App\Http\Controllers;

use App\Events\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $users = User::where('id', '!=', Auth::user()->id)->get();

        return view('home', compact('users'));
    }
    
    public function openChat(Request $request) //   load messages from db 
    {
 
        Session::put('to', $request->user);
      return $messages='<div class="incoming_msg">
        <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
        <div class="received_msg">
        <div class="received_withd_msg">
            <p>Test which is a new approach to have all
            solutions</p>
            <span class="time_date"> 11:01 AM    |    June 9</span></div>
        </div>
    </div>
    <div class="outgoing_msg">
        <div class="sent_msg">
        <p>These messages will be loaded from db</p>
        <span class="time_date"> 11:01 AM    |    June 9</span> </div>
    </div>';
        // event(new Message($request->input('username'), $request->input('message'),$request->input('user')));
        // event(new OnlineEvent($request->input('id'),$request->input('event')));
 
    }
    public function sendMessage(Request $request)
    {
        
        $to=Session::get('to');
        $from=Auth::user()->id;
        $name=Auth::user()->name;

        event(new Message($from,$name,$request->message,$to));
        
    }
}