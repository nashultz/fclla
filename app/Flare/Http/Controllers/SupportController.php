<?php

namespace FCLLA\Flare\Http\Controllers;

use FCLLA\Flare\Flare;
use Illuminate\Http\Request;
use FCLLA\Flare\Contracts\Interactions\Support\SendSupportEmail;

class SupportController extends Controller
{
    /**
     * Send a customer support request e-mail.
     *
     * @param  Request  $request
     * @return Response
     */
    public function sendEmail(Request $request)
    {
        $this->interaction($request, SendSupportEmail::class, [
            $request->all(),
        ]);
    }
}
