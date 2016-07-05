<?php

namespace FCLLA\Flare\Http\Controllers\Settings\Teams;

use FCLLA\Flare\Flare;
use FCLLA\Flare\Http\Controllers\Controller;

class TeamMemberRoleController extends Controller
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
     * Get the available team member roles.
     *
     * @return Response
     */
    public function all()
    {
        $roles = [];

        foreach (Flare::roles() as $key => $value) {
            $roles[] = ['value' => $key, 'text' => $value];
        }

        return response()->json($roles);
    }
}
