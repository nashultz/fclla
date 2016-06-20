<?php

namespace FCLLA\Listeners;

use FCLLA\Application;
use FCLLA\Events\UserApplicationWasDenied;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class RemoveUserApplication
{
    /**
     * @var Application
     */
    public $app;

    /**
     * Create the event listener.
     *
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        //
        $this->app = $app;
    }

    /**
     * Handle the event.
     *
     * @param  UserApplicationWasDenied $event
     * @internal param Application $app
     */
    public function handle(UserApplicationWasDenied $event)
    {
        $app->where('id',$event->app->id)->delete();
    }
}
