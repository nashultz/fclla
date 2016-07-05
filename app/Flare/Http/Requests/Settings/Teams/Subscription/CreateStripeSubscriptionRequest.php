<?php

namespace FCLLA\Flare\Http\Requests\Settings\Teams\Subscription;

use FCLLA\Flare\Flare;
use FCLLA\Flare\Http\Requests\ValidatesBillingAddresses;
use FCLLA\Flare\Contracts\Http\Requests\Settings\Teams\Subscription\CreateSubscriptionRequest as Contract;

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
        $validator = $this->baseValidator([
            'stripe_token' => 'required',
            'vat_id' => 'max:50|vat_id',
        ]);

        if (Flare::collectsBillingAddress()) {
            $this->validateBillingAddress($validator);
        }

        return $validator;
    }
}
