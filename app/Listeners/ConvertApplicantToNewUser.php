<?php

namespace FCLLA\Listeners;

use FCLLA\Application;
use FCLLA\Events\NewUserAccountCreated;
use FCLLA\Events\UserApplicationWasApproved;
use FCLLA\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ConvertApplicantToNewUser
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
        //
        $user = array($event->app);
        dd($user);
        event(new NewUserAccountCreated($user));
        Application::where('id',$event->app->id)->delete();
    }
}
