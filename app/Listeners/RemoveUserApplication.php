<?php

namespace FCLLA\Listeners;

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
     * @param  UserApplicationWasDenied  $event
     * @return void
     */
    public function handle(UserApplicationWasDenied $event)
    {
        dd($event);
    }
}
