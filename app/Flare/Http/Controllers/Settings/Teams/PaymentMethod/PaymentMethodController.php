<?php

namespace FCLLA\Flare\Http\Controllers\Settings\Teams\PaymentMethod;

use FCLLA\Flare\Team;
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
     * @param  Team  $team
     * @return Response
     */
    public function update(UpdatePaymentMethodRequest $request, Team $team)
    {
        abort_unless($request->user()->ownsTeam($team), 403);

        Flare::interact(UpdatePaymentMethod::class, [
            $team, $request->all(),
        ]);
    }
}
