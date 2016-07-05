<?php

namespace FCLLA\Flare\Http\Controllers\Settings;

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
     * Show the settings dashboard.
     *
     * @return Response
     */
    public function show()
    {
        return view('flare::settings');
    }
}
