<?php

namespace FCLLA\Flare\Http\Controllers\Settings\Teams;

use Illuminate\Http\Request;
use FCLLA\Flare\Http\Controllers\Controller;

class TeamNameController extends Controller
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
     * Update the given team's name.
     *
     * @param  Request  $request
     * @param  \FCLLA\Flare\Team  $team
     * @return Response
     */
    public function update(Request $request, $team)
    {
        abort_unless($request->user()->ownsTeam($team), 404);

        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        $team->forceFill([
            'name' => $request->name,
        ])->save();
    }
}
