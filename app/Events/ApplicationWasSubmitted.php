<?php

namespace FCLLA\Events;

use FCLLA\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ApplicationWasSubmitted extends Event
{
    use SerializesModels;

    public $application;

    /**
     * Create a new event instance.
     *
     * @param 
     */
    public function __construct($application)
    {
        $this->application = $application;
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
