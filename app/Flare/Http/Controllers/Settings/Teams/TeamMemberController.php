<?php

namespace FCLLA\Flare\Http\Controllers\Settings\Teams;

use FCLLA\Flare\Flare;
use Illuminate\Http\Request;
use FCLLA\Flare\Http\Controllers\Controller;
use FCLLA\Flare\Events\Teams\TeamMemberRemoved;
use FCLLA\Flare\Http\Requests\Settings\Teams\RemoveTeamMemberRequest;
use FCLLA\Flare\Contracts\Interactions\Settings\Teams\UpdateTeamMember;

class TeamMemberController extends Controller
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
     * Update the given team member.
     *
     * @param  Request  $request
     * @param  \FCLLA\Flare\Team  $team
     * @param  mixed  $member
     * @return Response
     */
    public function update(Request $request, $team, $member)
    {
        abort_unless($request->user()->ownsTeam($team), 404);

        $this->interaction($request, UpdateTeamMember::class, [
            $team, $member, $request->all()
        ]);
    }

    /**
     * Remove the given team member from the team.
     *
     * @param  RemoveTeamMemberRequest  $request
     * @param  \FCLLA\Flare\Team  $team
     * @param  mixed  $member
     * @return Response
     */
    public function destroy(RemoveTeamMemberRequest $request, $team, $member)
    {
        $team->users()->detach($member->id);

        event(new TeamMemberRemoved($team, $member));
    }
}
