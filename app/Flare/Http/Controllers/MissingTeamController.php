<?php

namespace FCLLA\Flare\Http\Controllers;

class MissingTeamController extends Controller
{
    /**
     * Show the missing team notice.
     *
     * @return Response
     */
    public function show()
    {
        return view('flare::missing-team');
    }
}
