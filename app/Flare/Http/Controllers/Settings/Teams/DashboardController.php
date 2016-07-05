<?php

namespace FCLLA\Flare\Http\Controllers\Settings\Teams;

use Illuminate\Http\Request;
use FCLLA\Flare\Http\Controllers\Controller;

class DashboardController extends Controller
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
     * Show the team settings dashboard.
     *
     * @param  Request  $request
     * @param  Team  $team
     * @return Response
     */
    public function show(Request $request, $team)
    {
        abort_unless($request->user()->onTeam($team), 404);

        return view('flare::settings.teams.team-settings', compact('team'));
    }
}
