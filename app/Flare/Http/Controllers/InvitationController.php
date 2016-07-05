<?php

namespace FCLLA\Flare\Http\Controllers;

use Illuminate\Http\Request;
use FCLLA\Flare\Invitation;
use FCLLA\Flare\Http\Controllers\Controller;

class InvitationController extends Controller
{
    /**
     * Get the given invitation.
     *
     * This is used during registration to show the invitation.
     *
     * @param  string  $token
     * @return Response
     */
    public function show($token)
    {
        $invitation = Invitation::with('team')->where('token', $token)->firstOrFail();

        if ($invitation->isExpired()) {
            $invitation->delete();

            abort(404);
        }

        return $invitation;
    }
}
