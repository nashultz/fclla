<?php

namespace FCLLA\Flare\Http\Controllers\Settings\Teams;

use FCLLA\Flare\Flare;
use Illuminate\Http\Request;
use FCLLA\Flare\Invitation;
use FCLLA\Flare\Http\Controllers\Controller;
use FCLLA\Flare\Contracts\Interactions\Settings\Teams\AddTeamMember;

class PendingInvitationController extends Controller
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
     * Get all of the pending invitations for the user.
     *
     * @param  Request  $request
     * @return Response
     */
    public function all(Request $request)
    {
        return $request->user()->invitations()->with('team')->get();
    }

    /**
     * Accept the given invitations.
     *
     * @param  Request  $request
     * @param  \FCLLA\Flare\Invitation  $invitation
     * @return Response
     */
    public function accept(Request $request, Invitation $invitation)
    {
        abort_unless($request->user()->id == $invitation->user_id, 404);

        Flare::interact(AddTeamMember::class, [
            $invitation->team, $request->user()
        ]);

        $invitation->delete();
    }

    /**
     * Reject the given invitations.
     *
     * @param  Request  $request
     * @param  \FCLLA\Flare\Invitation  $invitation
     * @return Response
     */
    public function reject(Request $request, Invitation $invitation)
    {
        abort_unless($request->user()->id == $invitation->user_id, 404);

        $invitation->delete();
    }
}
