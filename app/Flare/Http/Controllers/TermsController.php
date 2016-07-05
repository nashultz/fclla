<?php

namespace FCLLA\Flare\Http\Controllers;

use Parsedown;
use FCLLA\Flare\Flare;

class TermsController extends Controller
{
    /**
     * Show the terms of service for the application.
     *
     * @return Response
     */
    public function show()
    {
        return view('flare::terms', [
            'terms' => (new Parsedown)->text(file_get_contents(base_path('terms.md')))
        ]);
    }
}
