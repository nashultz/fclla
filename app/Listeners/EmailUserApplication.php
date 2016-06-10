<?php

namespace FCLLA\Listeners;

use FCLLA\Events\ApplicationWasSubmitted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class EmailUserApplication
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
     * @param  ApplicationWasSubmitted  $event
     * @return void
     */
    public function handle(ApplicationWasSubmitted $event)
    {
        flash()->info('EmailUserApplication called.');
    }
}
