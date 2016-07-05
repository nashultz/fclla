<?php

namespace FCLLA\Flare\Http\Controllers\Settings\PaymentMethod;

use FCLLA\Flare\Flare;
use Illuminate\Http\Request;
use FCLLA\Flare\Http\Controllers\Controller;
use FCLLA\Flare\Contracts\Repositories\UserRepository;

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
     * Update the VAT ID for the user.
     *
     * @param  Request  $request
     * @return Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'vat_id' => 'max:50|vat_id',
        ]);

        Flare::call(UserRepository::class.'@updateVatId', [
            $request->user(), $request->vat_id
        ]);
    }
}
