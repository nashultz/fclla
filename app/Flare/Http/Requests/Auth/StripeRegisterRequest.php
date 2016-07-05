<?php

namespace FCLLA\Flare\Http\Requests\Auth;

use Exception;
use FCLLA\Flare\Flare;
use Stripe\Token as StripeToken;
use FCLLA\Flare\Http\Requests\ValidatesBillingAddresses;
use FCLLA\Flare\Contracts\Http\Requests\Auth\RegisterRequest as Contract;

class StripeRegisterRequest extends RegisterRequest implements Contract
{
    use ValidatesBillingAddresses;

    /**
     * Get the validator for the request.
     *
     * @return \Illuminate\Validation\Validator
     */
    public function validator()
    {
        $validator = $this->registerValidator(['stripe_token']);

        if (Flare::collectsBillingAddress() && $this->hasPaidPlan()) {
            $this->validateBillingAddress($validator);
        }

        return $validator;
    }
}
