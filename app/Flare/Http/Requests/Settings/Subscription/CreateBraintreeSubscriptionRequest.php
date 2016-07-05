<?php

namespace FCLLA\Flare\Http\Requests\Settings\Subscription;

use FCLLA\Flare\Flare;
use FCLLA\Flare\Coupon;
use Illuminate\Support\Facades\Validator;
use FCLLA\Flare\Contracts\Repositories\CouponRepository;
use FCLLA\Flare\Contracts\Http\Requests\Settings\Subscription\CreateSubscriptionRequest as Contract;

class CreateBraintreeSubscriptionRequest extends CreateSubscriptionRequest implements Contract
{
    /**
     * Get the validator for the request.
     *
     * @return \Illuminate\Validation\Validator
     */
    public function validator()
    {
        $validator = Validator::make($this->all(), [
            'braintree_type' => 'required',
            'braintree_token' => 'required',
            'plan' => 'required|in:'.Flare::activePlanIdList()
        ]);

        return $validator->after(function ($validator) {
            $this->validatePlanEligibility($validator);

            if ($this->coupon) {
                $this->validateCoupon($validator);
            }
        });
    }
}
