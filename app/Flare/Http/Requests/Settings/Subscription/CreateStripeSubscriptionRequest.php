<?php

namespace FCLLA\Flare\Http\Requests\Settings\Subscription;

use FCLLA\Flare\Flare;
use FCLLA\Flare\Coupon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Http\FormRequest;
use FCLLA\Flare\Http\Requests\ValidatesBillingAddresses;
use FCLLA\Flare\Contracts\Repositories\CouponRepository;
use FCLLA\Flare\Contracts\Http\Requests\Settings\Subscription\CreateSubscriptionRequest as Contract;

class CreateStripeSubscriptionRequest extends CreateSubscriptionRequest implements Contract
{
    use ValidatesBillingAddresses;

    /**
     * Get the validator for the request.
     *
     * @return \Illuminate\Validation\Validator
     */
    public function validator()
    {
        $validator = Validator::make($this->all(), [
            'stripe_token' => 'required',
            'plan' => 'required|in:'.Flare::activePlanIdList(),
            'vat_id' => 'max:50|vat_id',
        ]);

        if (Flare::collectsBillingAddress()) {
            $this->validateBillingAddress($validator);
        }

        return $validator->after(function ($validator) {
            $this->validatePlanEligibility($validator);

            if ($this->coupon) {
                $this->validateCoupon($validator);
            }
        });
    }
}
