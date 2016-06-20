<?php

namespace FCLLA\Listeners;

use FCLLA\Application;
use FCLLA\Events\UserApplicationWasDenied;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class RemoveUserApplication
{

    /**
     * Create the event listener.
     *
     * @internal param Application $app
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserApplicationWasDenied $event
     * @internal param Application $app
     */
    public function handle(UserApplicationWasDenied $event)
    {
        Application::where('id',$event->app->id)->delete();
    }
}
