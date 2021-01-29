<?php

namespace App\Architecture\Bookings\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use stdClass;

class ReservedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $params;

    /**
     * ReservedEvent constructor.
     * @param stdClass $params
     */
    public function __construct(stdClass $params)
    {
        $this->params = $params;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }

    /**
     * @return stdClass
     */
    public function getParams() : stdClass
    {
        return $this->params;
    }
}
