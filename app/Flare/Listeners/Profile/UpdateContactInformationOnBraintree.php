<?php

namespace FCLLA\Flare\Listeners\Profile;

use Braintree\Customer as BraintreeCustomer;

class UpdateContactInformationOnBraintree
{
    /**
     * Handle the event.
     *
     * @param  \FCLLA\Flare\Events\Profile\ContactInformationUpdated  $event
     */
    public function handle($event)
    {
        if (! $event->user->hasBillingProvider()) {
            return;
        }

        BraintreeCustomer::update($event->user->braintree_id, [
            'email' => $event->user->email,
        ]);
    }
}
