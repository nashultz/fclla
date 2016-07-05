<?php

namespace FCLLA\Flare\Http\Requests\Settings\PaymentMethod;

use Illuminate\Foundation\Http\FormRequest;
use FCLLA\Flare\Contracts\Http\Requests\Settings\PaymentMethod\UpdatePaymentMethodRequest;

class UpdateBraintreePaymentMethodRequest extends FormRequest implements UpdatePaymentMethodRequest
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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'braintree_type' => 'required',
            'braintree_token' => 'required',
        ];
    }
}
