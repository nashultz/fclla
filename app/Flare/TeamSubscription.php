<?php

namespace FCLLA\Flare;

use Laravel\Cashier\Subscription as CashierSubscription;

class TeamSubscription extends CashierSubscription
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'team_subscriptions';

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['provider_plan'];

    /**
     * Get the team that owns the subscription.
     */
    public function team()
    {
        return $this->user();
    }

    /**
     * Get the team that owns the subscription.
     */
    public function user()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

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
