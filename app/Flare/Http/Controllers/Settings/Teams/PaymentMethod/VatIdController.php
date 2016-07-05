<?php

namespace FCLLA\Flare\Http\Controllers\Settings\Teams\PaymentMethod;

use FCLLA\Flare\Team;
use FCLLA\Flare\Flare;
use Illuminate\Http\Request;
use FCLLA\Flare\Http\Controllers\Controller;
use FCLLA\Flare\Contracts\Repositories\TeamRepository;

class VatIdController extends Controller
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
     * Update the VAT ID for the team.
     *
     * @param  Request  $request
     * @param  Team  $team
     * @return Response
     */
    public function update(Request $request, Team $team)
    {
        $this->validate($request, [
            'vat_id' => 'max:50|vat_id',
        ]);

        Flare::call(TeamRepository::class.'@updateVatId', [
            $team, $request->vat_id
        ]);
    }
}
