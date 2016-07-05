<?php

namespace FCLLA\Flare\Events;

class NotificationCreated
{
    /**
     * The notification instance.
     *
     * @var \FCLLA\Flare\Notification
     */
    public $notification;

    /**
     * Create a new notification instance.
     *
     * @param  \FCLLA\Flare\Notification  $notification
     * @return void
     */
    public function __construct($notification)
    {
        $this->notification = $notification;
    }
}
