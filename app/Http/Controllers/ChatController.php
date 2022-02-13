<?php

namespace App\Http\Controllers;

use App\Events\MessageEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Message;

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
        $to= $request->user;
        $from= Auth::user()->id;

         $msgs = Message::orderBy('created_at','asc')
            ->where  ([['to',$to] ,  ['from',$from] ])
            ->orWhere([['from',$to] , ['to',$from] ])
            ->get();



        $messages='';
        foreach ($msgs as $message) {
            
           if($message->from==$from){
               $messages.='<div class="outgoing_msg">
               <div class="sent_msg">
               <p>'.$message->message.'</p>
               <span class="time_date"> '.$message->created_at.'</span> </div>
           </div>';
           } else{
               $messages.='<div class="incoming_msg">
               <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
               <div class="received_msg">
               <div class="received_withd_msg">
               '.$message->from_name.'
                   <p>'.$message->message.'</p>
                   <span class="time_date"> '.$message->created_at.'</span></div>
               </div>';
           }
        }
        Session::put('to', $to);
        return $messages;
        
    }
    public function clearChat(){
        $to=Session::get('to');
        $from=Auth::user()->id;
        if($to!=null ){
        $msgs = Message::where  ([['to',$to] ,  ['from',$from] ])
            ->orWhere([['from',$to] , ['to',$from] ])
            ->delete();
           return "success";
        }else{
            return "";
        }
        
         
    }
    public function sendMessage(Request $request)
    {
        
        $to=Session::get('to');
        $from=Auth::user()->id;
        $name=Auth::user()->name;

        event(new MessageEvent($from,$name,$request->message,$to));
        $message = new Message;
        $message->message = $request->message;
        $message->from = $from;
        $message->to = $to;
        $message->from_name = $name;
        $message->save();
    }
}