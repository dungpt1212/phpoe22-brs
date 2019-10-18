<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Models\RequestNewbook;

class SendMailWhenRequestNewBookSuccessEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $require;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(RequestNewbook $require)
    {
        $this->require = $require;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
