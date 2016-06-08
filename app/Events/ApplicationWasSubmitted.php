<?php

namespace FCLLA\Events;

use FCLLA\Application;
use FCLLA\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ApplicationWasSubmitted extends Event
{
    use SerializesModels;

    protected $application;

    /**
     * Create a new event instance.
     *
     * @param Application $application
     */
    public function __construct(Application $application)
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
