<?php

namespace FCLLA\Listeners;

use FCLLA\Events\UserApplicationWasApproved;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class EmailUserApprovalLetter
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
     * @param  UserApplicationWasApproved  $event
     * @return void
     */
    public function handle(UserApplicationWasApproved $event)
    {
        $user = $event->app;
        $data = array('user'=>$user);
        Mail::send('emails.approveuserapplication', $data,  function($m) use ($user) {
            $m->from('info@fclla.org', 'Faulkner County Landlord Association');
            $m->to($user['email'], $user['username'])->subject('FCLLA Membership Application Status');
            $m->bcc('nashultz07@gmail.com', 'Nathon Shultz');
        });
    }
}
