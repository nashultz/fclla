<?php

namespace FCLLA\Flare\Http\Controllers\Settings\Profile;

use Illuminate\Http\Request;
use FCLLA\Flare\Http\Controllers\Controller;
use FCLLA\Flare\Contracts\Interactions\Settings\Profile\UpdateContactInformation;

class ContactInformationController extends Controller
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
     * Update the user's contact information settings.
     *
     * @param  Request  $request
     * @return Response
     */
    public function update(Request $request)
    {
        $this->interaction(
            $request, UpdateContactInformation::class,
            [$request->user(), $request->all()]
        );
    }
}
