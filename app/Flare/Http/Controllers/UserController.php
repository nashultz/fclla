<?php

namespace FCLLA\Flare\Http\Controllers;

use Exception;
use Carbon\Carbon;
use FCLLA\Flare\Flare;
use Illuminate\Http\Request;
use GuzzleHttp\Client as HttpClient;
use FCLLA\Flare\Contracts\Repositories\UserRepository;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only(
            'updateLastReadAnnouncementsTimestamp'
        );
    }

    /**
     * Get the current user of the appliation.
     *
     * @return Response
     */
    public function current()
    {
        return Flare::interact(UserRepository::class.'@current');
    }

    /**
     * Update the last read announcements timestamp.
     *
     * @param  Request  $request
     * @return Response
     */
    public function updateLastReadAnnouncementsTimestamp(Request $request)
    {
        $request->user()->forceFill([
            'last_read_announcements_at' => Carbon::now(),
        ])->save();
    }
}
