<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class UpdateStatus implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $task;

    public function __construct($task)
    {
        $this->task = $task;
    }

    public function broadcastOn()
    {
        return new Channel('updatestatus');
    }

    public function broadcastWith()
    {
        return [
            'id' => $this->task->id,
            'name' => $this->task->title,
            'status' => $this->task->status->name ?? ''
        ];
    }
}
