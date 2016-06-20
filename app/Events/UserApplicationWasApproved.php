<?php

namespace FCLLA\Events;

use FCLLA\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class UserApplicationWasApproved extends Event
{
    use SerializesModels;
    /**
     * @var
     */
    public $app;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($app)
    {
        //
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
