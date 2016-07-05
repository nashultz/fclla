<?php

namespace FCLLA\Flare\Listeners\Profile;

class UpdateContactInformationOnStripe
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

        $customer = $event->user->asStripeCustomer();

        $customer->email = $event->user->email;

        $customer->save();
    }
}
