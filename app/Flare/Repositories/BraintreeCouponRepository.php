<?php

namespace FCLLA\Flare\Repositories;

use Exception;
use FCLLA\Flare\Flare;
use FCLLA\Flare\Coupon;
use Braintree\Discount as BraintreeDiscount;
use FCLLA\Flare\Contracts\Repositories\CouponRepository;

class BraintreeCouponRepository implements CouponRepository
{
    /**
     * {@inheritdoc}
     */
    public function valid($code)
    {
        return $code == 'plan-credit' ? false : ! is_null($this->find($code));
    }

    /**
     * {@inheritdoc}
     */
    public function canBeRedeemed($code)
    {
        return $this->valid($code) && Flare::promotion() !== $code;
    }

    /**
     * {@inheritdoc}
     */
    public function find($code)
    {
        $discounts = BraintreeDiscount::all();

        foreach ($discounts as $discount) {
            if ($discount->id === $code) {
                return $this->toCoupon($discount);
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function forBillable($billable)
    {
        if ($billable->subscribed()) {
            $subscription = $billable->subscription()->asBraintreeSubscription();

            if (! empty($subscription->discounts)) {
                return $this->toCoupon($subscription->discounts[0]);
            }
        }
    }

    /**
     * Convert the given Braintree discount into a Coupon instance.
     *
     * @param  BraintreeDiscount  $discount
     * @return Coupon
     */
    protected function toCoupon($discount)
    {
        return new Coupon(
            $discount->neverExpires ? 'forever' : 'repeating',
            $discount->numberOfBillingCycles, $discount->amount
        );
    }
}
