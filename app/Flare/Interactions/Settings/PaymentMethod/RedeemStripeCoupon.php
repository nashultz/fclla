<?php

namespace FCLLA\Flare\Interactions\Settings\PaymentMethod;

use FCLLA\Flare\Contracts\Interactions\Settings\PaymentMethod\RedeemCoupon;

class RedeemStripeCoupon implements RedeemCoupon
{
    /**
     * {@inheritdoc}
     */
    public function handle($billable, $coupon)
    {
        $billable->applyCoupon($coupon);
    }
}
