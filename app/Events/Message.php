<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Message implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
  
    public $from;
    public $name;
    public $message;
    public $to;
  
    public function __construct($from,$name,$message,$to)
    {
        
        $this->message = $message;
        $this->name = $name;
        $this->from = $from;
        $this->to = $to;
    }
  
    public function broadcastOn()
    {
        return 'chat';
    }
  
    public function broadcastAs()
    {
        
        return $this->to;
    }
  }