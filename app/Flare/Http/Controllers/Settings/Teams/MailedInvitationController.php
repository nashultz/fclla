<?php

namespace FCLLA\Flare\Http\Controllers\Settings\Teams;

use FCLLA\Flare\Flare;
use Illuminate\Http\Request;
use FCLLA\Flare\Invitation;
use FCLLA\Flare\Http\Controllers\Controller;
use FCLLA\Flare\Contracts\Repositories\TeamRepository;
use FCLLA\Flare\Http\Requests\Settings\Teams\CreateInvitationRequest;
use FCLLA\Flare\Contracts\Interactions\Settings\Teams\SendInvitation;

class MailedInvitationController extends Controller
{
    /**
     * The team repository implementation.
     *
     * @var \FCLLA\Flare\Contracts\Repositories\TeamRepository
     */
    protected $teams;

    /**
     * Create a new controller instance.
     *
     * @param  TeamRepository  $teams
     * @return void
     */
    public function __construct(TeamRepository $teams)
    {
        $this->teams = $teams;

        $this->middleware('auth');
    }

    /**
     * Get all of the mailed invitations for the given team.
     *
     * @param  Request  $request
     * @param  \FCLLA\Flare\Team  $team
     * @return Response
     */
    public function all(Request $request, $team)
    {
        abort_unless($request->user()->onTeam($team), 404);

        return $team->invitations;
    }

    /**
     * Create a new invitation.
     *
     * @param  CreateInvitationRequest  $request
     * @param  \FCLLA\Flare\Team  $team
     * @return Response
     */
    public function store(CreateInvitationRequest $request, $team)
    {
        Flare::interact(SendInvitation::class, [$team, $request->email]);
    }

    /**
     * Cancel / delete the given invitation.
     *
     * @param  Request  $request
     * @param  \FCLLA\Flare\Invitation  $invitation
     * @return Response
     */
    public function destroy(Request $request, Invitation $invitation)
    {
        abort_unless($request->user()->ownsTeam($invitation->team), 404);

        $invitation->delete();
    }
}
