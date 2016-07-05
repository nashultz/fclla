<?php

namespace FCLLA\Flare\Http\Requests\Settings\Teams\Subscription;

use FCLLA\Flare\Flare;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSubscriptionRequest extends FormRequest
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
     * Get the validator for the request.
     *
     * @return \Illuminate\Validation\Validator
     */
    public function validator()
    {
        $validator = Validator::make($this->all(), [
            'plan' => 'required|in:'.Flare::activeTeamPlanIdList()
        ]);

        return $validator->after(function ($validator) {
            $this->validatePlanEligibility($validator);
        });
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
