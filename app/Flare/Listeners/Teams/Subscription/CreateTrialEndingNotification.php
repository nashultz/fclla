<?php

namespace FCLLA\Flare\Listeners\Teams\Subscription;

use FCLLA\Flare\Flare;
use FCLLA\Flare\Events\Teams\TeamCreated;
use FCLLA\Flare\Contracts\Repositories\NotificationRepository;

class CreateTrialEndingNotification
{
    /**
     * The notification repository instance.
     *
     * @var NotificationRepository
     */
    protected $notifications;

    /**
     * Create a new listener instance.
     *
     * @param  NotificationRepository  $notifications
     * @return void
     */
    public function __construct(NotificationRepository $notifications)
    {
        $this->notifications = $notifications;
    }

    /**
     * Handle the event.
     *
     * @param  TeamCreated  $event
     * @return void
     */
    public function handle(TeamCreated $event)
    {
        if (! Flare::teamTrialDays()) {
            return;
        }

        $this->notifications->create($event->team->owner, [
            'icon' => 'fa-clock-o',
            'body' => "The ".$event->team->name." team's trial period will expire on ".$event->team->trial_ends_at->format('F jS').'.',
            'action_text' => 'Subscribe',
            'action_url' => '/settings/teams/'.$event->team->id.'#/subscription',
        ]);
    }
}
