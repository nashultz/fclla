<?php

namespace FCLLA\Listeners;

use FCLLA\Events\UserApplicationWasDenied;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailUserDenialLetter
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserApplicationWasDenied  $event
     * @return void
     */
    public function handle(UserApplicationWasDenied $event)
    {
        $user = $event->app;
        Mail::send('emails.denyuserapplication', $user,  function($m) use ($user) {
            $m->from('info@fclla.org', 'Faulkner County Landlord Association');
            $m->to($user['email'], $user['username'])->subject('FCLLA Membership Application Status');
            $m->bcc('nashultz07@gmail.com', 'Nathon Shultz');
        });
    }
}
