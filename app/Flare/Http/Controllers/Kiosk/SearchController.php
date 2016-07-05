<?php

namespace FCLLA\Flare\Http\Controllers\Kiosk;

use FCLLA\Flare\Flare;
use Illuminate\Http\Request;
use FCLLA\Flare\Http\Controllers\Controller;
use FCLLA\Flare\Contracts\Repositories\UserRepository;

class SearchController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('dev');
    }

    /**
     * Get the users based on the incoming search query.
     *
     * @param  Request  $request
     * @return Response
     */
    public function performBasicSearch(Request $request)
    {
        $query = str_replace('*', '%', $request->input('query'));

        return Flare::interact(UserRepository::class.'@search', [
            $query, $request->user()
        ]);
    }
}
