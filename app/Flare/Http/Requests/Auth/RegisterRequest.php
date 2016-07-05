<?php

namespace FCLLA\Flare\Http\Requests\Auth;

use FCLLA\Flare\Flare;
use FCLLA\Flare\Invitation;
use Illuminate\Foundation\Http\FormRequest;
use FCLLA\Flare\Contracts\Interactions\Auth\CreateUser;
use FCLLA\Flare\Contracts\Repositories\CouponRepository;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validator for a registration request.
     *
     * @param  array  $paymentAttributes
     * @return \Illuminate\Validation\Validator
     */
    protected function registerValidator(array $paymentAttributes)
    {
        $validator = $this->baseValidator();

        // If a paid plan is selected, we will validate the given required fields which
        // are typically the Stripe / Braintree tokens. If the selected plan is free
        // of course we will not need to validate that these fields are available.
        $validator->sometimes($paymentAttributes, 'required', function ($input) {
            return $this->plan() && $this->plan()->price > 0;
        });

        return $this->after($validator);
    }

    /**
     * Get the base validator instance for a register request.
     *
     * @return \Illuminate\Validation\Validator
     */
    public function baseValidator()
    {
        $validator = Flare::interact(
            CreateUser::class.'@validator', [$this]
        );

        $validator->sometimes('plan', 'required|in:'.Flare::activePlanIdList(), function () {
            return Flare::needsCardUpFront();
        });

        return $validator;
    }

    /**
     * Setup the "after" callabck for the validator.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return \Illuminate\Validation\Validator
     */
    protected function after($validator)
    {
        return $validator->after(function ($validator) {
            if ($this->coupon) {
                $this->validateCoupon($validator);
            }

            if ($this->invitation) {
                $this->validateInvitation($validator);
            }
        });
    }

    /**
     * Validate the coupon on the request.
     *
     * @param  \Illuminate\Validation\Validator  $valdiator
     * @return void
     */
    protected function validateCoupon($validator)
    {
        if (! app(CouponRepository::class)->valid($this->coupon)) {
            $validator->errors()->add('coupon', 'This coupon code is invalid.');
        }
    }

    /**
     * Validate the invitation code on the request.
     *
     * @param  \Illuminate\Validation\Validator  $valdiator
     * @return void
     */
    protected function validateInvitation($validator)
    {
        if (! $this->invitation()) {
            $validator->errors()->add('invitation', 'This invitation code is invalid.');
        }
    }

    /**
     * Determine if the request contains a paid plan.
     *
     * @return bool
     */
    public function hasPaidPlan()
    {
        return $this->plan() && $this->plan()->price > 0;
    }

    /**
     * Get the full plan array for the specified plan.
     *
     * @return \FCLLA\Flare\Plan|null
     */
    public function plan()
    {
        if ($this->plan) {
            return Flare::plans()->where('id', $this->plan)->first();
        }
    }

    /**
     * Get the full invitation instance.
     *
     * @return \FCLLA\Flare\Invitation
     */
    public function invitation()
    {
        if ($this->invitation) {
            return Invitation::where('token', $this->invitation)->first();
        }
    }
}
