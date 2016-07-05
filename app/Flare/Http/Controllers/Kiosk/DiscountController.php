<?php

namespace FCLLA\Flare\Http\Controllers\Kiosk;

use FCLLA\Flare\Flare;
use Illuminate\Http\Request;
use Stripe\Coupon as StripeCoupon;
use FCLLA\Flare\Http\Controllers\Controller;

class DiscountController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('dev');
    }

    /**
     * Create a discount for the given user.
     *
     * @param  Request  $request
     * @param  string  $userId
     * @return Response
     */
    public function store(Request $request, $userId)
    {
        $user = Flare::user()->where('id', $userId)->firstOrFail();

        $this->validate($request, [
            'type' => 'required|in:amount,percent',
            'value' => 'required|integer',
            'duration' => 'required|in:once,forever,repeating',
            'months' => 'required_if:duration,repeating',
        ]);

        $coupon = StripeCoupon::create([
            'currency' => 'usd',
            'amount_off' => $request->type == 'amount' ? $request->value * 100 : null,
            'percent_off' => $request->type == 'percent' ? $request->value : null,
            'duration' => $request->duration,
            'duration_in_months' => $request->months,
            'max_redemptions' => 1,
        ], config('services.stripe.secret'));

        $user->applyCoupon($coupon->id);
    }
}
