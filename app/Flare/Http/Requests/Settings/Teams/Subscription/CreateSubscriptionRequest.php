<?php

namespace FCLLA\Flare\Http\Requests\Settings\Teams\Subscription;

use FCLLA\Flare\Flare;
use FCLLA\Flare\Coupon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Http\FormRequest;
use FCLLA\Flare\Contracts\Repositories\CouponRepository;

class CreateSubscriptionRequest extends FormRequest
{
    use DeterminesTeamPlanEligibility;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->ownsTeam($this->route('team'));
    }

    /**
     * Get the validator instance for the request.
     *
     * @param  array  $rules
     * @return \Illuminate\Validation\Validator
     */
    public function baseValidator(array $rules)
    {
        $validator = Validator::make($this->all(), array_merge([
            'plan' => 'required|in:'.Flare::activeTeamPlanIdList()
        ], $rules));

        return $validator->after(function ($validator) {
            $this->validatePlanEligibility($validator);

            if ($this->coupon) {
                $this->validateCoupon($validator);
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
     * Get the Flare plan associated with the request.
     *
     * @return \FCLLA\Flare\Plan
     */
    public function plan()
    {
        return Flare::teamPlans()->where('id', $this->plan)->first();
    }
}
