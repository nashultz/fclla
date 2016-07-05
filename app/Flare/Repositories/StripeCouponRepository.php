<?php

namespace FCLLA\Flare\Repositories;

use Exception;
use FCLLA\Flare\Flare;
use FCLLA\Flare\Coupon;
use Stripe\Coupon as StripeCoupon;
use FCLLA\Flare\Contracts\Repositories\CouponRepository;

class StripeCouponRepository implements CouponRepository
{
    /**
     * {@inheritdoc}
     */
    public function valid($code)
    {
        return ! is_null($this->find($code));
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
        try {
            $coupon = StripeCoupon::retrieve(
                $code, ['api_key' => config('services.stripe.secret')]
            );

            if ($coupon && $coupon->valid) {
                return $this->toCoupon($coupon);
            }
        } catch (Exception $e) {
            //
        }
    }

    /**
     * {@inheritdoc}
     */
    public function forBillable($billable)
    {
        if (! $billable->stripe_id) {
            return;
        }

        $customer = $billable->asStripeCustomer();

        if ($customer->discount && $customer->discount->coupon) {
            return $this->toCoupon($customer->discount->coupon);
        }
    }

    /**
     * Convert the given Stripe coupon into a Coupon instance.
     *
     * @param  StripeCoupon  $coupon
     * @return Coupon
     */
    protected function toCoupon($coupon)
    {
        return new Coupon(
            $coupon->duration, $coupon->duration_in_months,
            $coupon->amount_off, $coupon->percent_off
        );
    }
}
