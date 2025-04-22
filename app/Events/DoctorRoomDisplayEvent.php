<?php

namespace App\Events;

use App\Models\DoctorTokenCall;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class DoctorRoomDisplayEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $doctorTokenCall;
    /**
     * Create a new event instance.
     */
    public function __construct(DoctorTokenCall $doctorTokenCall)
    {
        $this->doctorTokenCall = $doctorTokenCall;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn()
    {
        return new Channel("doctorTokenCall");
    }

    /* public function broadcastWith()
    {
        return [
            'latestToken' => $this->doctorTokenCall
        ];
    } */
}
