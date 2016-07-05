<?php

namespace FCLLA\Flare;

use Laravel\Cashier\Subscription as CashierSubscription;

class Subscription extends CashierSubscription
{
    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['provider_plan'];

    /**
     * Get the "provider_plan" attribute from the model.
     *
     * @return string
     */
    public function getProviderPlanAttribute()
    {
        return Flare::billsUsingStripe()
                        ? $this->stripe_plan : $this->braintree_plan;
    }
}
