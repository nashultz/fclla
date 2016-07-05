<?php

namespace FCLLA\Flare\Http\Controllers;

use FCLLA\Flare\Flare;
use FCLLA\Flare\Coupon;
use Illuminate\Http\Request;
use FCLLA\Flare\Contracts\Repositories\CouponRepository;

class TeamCouponController extends Controller
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

        $this->middleware('auth')->only('current');
    }

    /**
     * Get the current discount for the given team.
     *
     * @param  Request  $request
     * @param  string  $userId
     * @return Response
     */
    public function current(Request $request, $teamId)
    {
        $team = Flare::team()->where('id', $teamId)->firstOrFail();

        if ($coupon = $this->coupons->forBillable($team)) {
            return response()->json($coupon->toArray());
        }
    }
}
