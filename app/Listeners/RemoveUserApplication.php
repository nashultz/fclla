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
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param Application $app
     * @param  UserApplicationWasDenied $event
     * @throws \Exception
     */
    public function handle(Application $app, UserApplicationWasDenied $event)
    {
        $app->where('id',$event->app->id)->delete();
    }
}
