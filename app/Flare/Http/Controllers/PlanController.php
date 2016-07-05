<?php

namespace FCLLA\Flare\Http\Controllers;

use FCLLA\Flare\Flare;

class PlanController extends Controller
{
    /**
     * Get the all of the plans defined for the appliation.
     *
     * @return Response
     */
    public function all()
    {
        return response()->json(Flare::plans());
    }
}
