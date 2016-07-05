<?php

namespace FCLLA\Flare;

use Laravel\Cashier\Billable as CashierBillable;
use Mpociot\VatCalculator\VatCalculator;

trait Billable
{
    use CashierBillable;

    /**
     * Determine if the user is connected to any payment provider.
     * @return bool
     */
    public function hasBillingProvider()
    {
        return $this->stripe_id || $this->braintree_id;
    }

    /**
     * Get all of the subscriptions for the user.
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class)->orderBy('created_at', 'desc');
    }

    /**
     * Get the Spark plan that corresponds with the given subscription.
     * If they are not subscribed and a free plan exists, that will be returned.
     * @param  string  $subscription
     * @return \FCLLA\Flare\Plan|null
     */
    public function flarePlan($subscription = 'default')
    {
        $subscription = $this->subscription($subscription);

        if ($subscription) {
            return $this->availablePlans()->first(function ($key, $value) use ($subscription) {
                return $value->id === $subscription->provider_plan;
            });
        }

        return $this->availablePlans()->first(function ($key, $value) {
            return $value->price === 0;
        });
    }

    /**
     * Get the available billing plans for the given entity.
     * @return \Illuminate\Support\Collection
     */
    public function availablePlans()
    {
        return Flare::plans();
    }

    /**
     * Get all of the local invoices.
     */
    public function localInvoices()
    {
        return $this->hasMany(LocalInvoice::class)->orderBy('id', 'desc');
    }

    /**
     * Get the tax percentage to apply to the subscription.
     * @return int
     */
    public function taxPercentage()
    {
        if (! Flare::collectsEuropeanVat()) {
            return 0;
        }

        $vatCalculator = new VatCalculator;

        $vatCalculator->setBusinessCountryCode(Flare::homeCountry());

        return $vatCalculator->getTaxRateForCountry(
            $this->card_country, ! empty($this->vat_id)
        ) * 100;
    }
}