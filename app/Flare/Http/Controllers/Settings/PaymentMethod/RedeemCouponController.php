<?php

namespace FCLLA\Flare\Http\Controllers\Settings\PaymentMethod;

use FCLLA\Flare\Flare;
use Illuminate\Http\Request;
use FCLLA\Flare\Http\Controllers\Controller;
use FCLLA\Flare\Contracts\Repositories\CouponRepository;
use FCLLA\Flare\Contracts\Interactions\Settings\PaymentMethod\RedeemCoupon;

class RedeemCouponController extends Controller
{
    /**
     * The coupon repository implementation.
     *
     * @var CouponRepository
     */
    protected $coupons;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CouponRepository $coupons)
    {
        $this->coupons = $coupons;

        $this->middleware('auth');
    }

    /**
     * Redeem the given coupon code.
     *
     * @param  Request  $request
     * @return Response
     */
    public function redeem(Request $request)
    {
        $this->validate($request, [
            'coupon' => 'required',
        ]);

        // We will verify that the coupon can actually be redeemed. In some cases even
        // valid coupons can not get redeemed by an existing user if this coupon is
        // running as a promotion for brand new registrations to the application.
        if (! $this->coupons->canBeRedeemed($request->coupon)) {
            return response()->json(['coupon' => [
                'This coupon code is invalid.'
            ]], 422);
        }

        Flare::interact(RedeemCoupon::class, [
            $request->user(), $request->coupon
        ]);
    }
}
