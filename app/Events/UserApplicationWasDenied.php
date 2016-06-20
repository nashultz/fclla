<?php

namespace FCLLA\Events;

use FCLLA\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class UserApplicationWasDenied extends Event
{
    use SerializesModels;
    public $app;

    /**
     * Create a new event instance.
     *
     * @param $app
     */
    public function __construct($app)
    {
        $this->app = $app;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
