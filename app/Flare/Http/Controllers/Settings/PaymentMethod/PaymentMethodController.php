<?php

namespace FCLLA\Flare\Http\Controllers\Settings\PaymentMethod;

use FCLLA\Flare\Flare;
use Illuminate\Http\Request;
use FCLLA\Flare\Http\Controllers\Controller;
use FCLLA\Flare\Contracts\Interactions\Settings\PaymentMethod\UpdatePaymentMethod;
use FCLLA\Flare\Contracts\Http\Requests\Settings\PaymentMethod\UpdatePaymentMethodRequest;

class PaymentMethodController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Update the payment method for the user.
     *
     * @param  UpdatePaymentMethodRequest  $request
     * @return Response
     */
    public function update(UpdatePaymentMethodRequest $request)
    {
        Flare::interact(UpdatePaymentMethod::class, [
            $request->user(), $request->all(),
        ]);
    }
}
