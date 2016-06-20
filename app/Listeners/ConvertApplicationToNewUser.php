<?php

namespace FCLLA\Listeners;

use FCLLA\Application;
use FCLLA\Events\UserApplicationWasApproved;
use FCLLA\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ConvertApplicationToNewUser
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
        User::create($event->app);
        Application::where('id',$event->app->id)->delete();
    }
}
