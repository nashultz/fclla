<?php

namespace FCLLA\Listeners;

use FCLLA\Events\UserHasPaidDues;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class RemoveUserFromUnpaidMemberTable
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
     * @param  UserHasPaidDues  $event
     * @return void
     */
    public function handle(UserHasPaidDues $event)
    {
        //
    }
}
