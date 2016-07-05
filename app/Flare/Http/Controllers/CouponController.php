<?php

namespace FCLLA\Flare\Http\Controllers;

use FCLLA\Flare\Flare;
use FCLLA\Flare\Coupon;
use Illuminate\Http\Request;
use FCLLA\Flare\Contracts\Repositories\CouponRepository;

class CouponController extends Controller
{
    /**
     * The coupon repository implementation.
     *
     * @var \FCLLA\Flare\Contracts\Repositories\CouponRepository
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

        $this->middleware('auth', ['only' => 'current']);
    }

    /**
     * Get the specified coupon from Stripe.
     *
     * This is used during registration to show the discount.
     *
     * @param  string  $code
     * @return Response
     */
    public function show($code)
    {
        $coupon = $this->coupons->find($code);

        return $coupon ? response()->json($coupon->toArray()) : abort(404);
    }

    /**
     * Get the current discount for the given user.
     *
     * @param  Request  $request
     * @param  string  $userId
     * @return Response
     */
    public function current(Request $request, $userId)
    {
        $user = Flare::user()->where('id', $userId)->firstOrFail();

        if ($coupon = $this->coupons->forBillable($user)) {
            return response()->json($coupon->toArray());
        }
    }
}
