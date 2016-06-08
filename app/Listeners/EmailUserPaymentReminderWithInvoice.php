<?php

namespace FCLLA\Listeners;

use FCLLA\Events\UserAddedToUnpaidMemberTable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailUserPaymentReminderWithInvoice
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
     * @param  UserAddedToUnpaidMemberTable  $event
     * @return void
     */
    public function handle(UserAddedToUnpaidMemberTable $event)
    {
        //
    }
}
