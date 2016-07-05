<?php

namespace FCLLA\Flare\Http\Controllers\Settings\Teams;

use FCLLA\Flare\Flare;
use Illuminate\Http\Request;
use FCLLA\Flare\Events\Teams\TeamDeleted;
use FCLLA\Flare\Events\Teams\DeletingTeam;
use FCLLA\Flare\Http\Controllers\Controller;
use FCLLA\Flare\Contracts\Interactions\Settings\Teams\CreateTeam;

class TeamController extends Controller
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
     * Create a new team.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $team = $this->interaction($request, CreateTeam::class, [
            $request->user(), $request->all()
        ]);
    }

    /**
     * Delete the given team.
     *
     * @param  Request  $request
     * @param  \FCLLA\Flare\Team  $team
     * @return Response
     */
    public function destroy(Request $request, $team)
    {
        if (! $request->user()->ownsTeam($team)) {
            abort(404);
        }

        event(new DeletingTeam($team));

        $team->detachUsersAndDestroy();

        event(new TeamDeleted($team));
    }
}
