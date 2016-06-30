<?php

namespace FCLLA\Listeners;

use FCLLA\Events\UserApplicationWasDenied;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

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
        $data = array('user'=>$user);
        Mail::send('emails.denyuserapplication', $data,  function($m) use ($user) {
            $m->from('noreply@fclla.org', 'Faulkner County Landlord Association');
            $m->to($user['email'], $user['username'])->subject('FCLLA Membership Application Status');
        });
    }
}
