<?php

namespace FCLLA\Flare\Http\Controllers;

use FCLLA\Flare\Flare;

class TeamPlanController extends Controller
{
    /**
     * Get the all of the team plans defined for the appliation.
     *
     * @return Response
     */
    public function all()
    {
        return response()->json(Flare::teamPlans());
    }
}
