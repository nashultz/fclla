<?php

namespace FCLLA\Flare\Http\Controllers\Settings\Profile;

use Illuminate\Http\Request;
use FCLLA\Flare\Http\Controllers\Controller;
use FCLLA\Flare\Contracts\Interactions\Settings\Profile\UpdateProfilePhoto;

class PhotoController extends Controller
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
     * Store the user's profile photo.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->interaction(
            $request, UpdateProfilePhoto::class,
            [$request->user(), $request->all()]
        );
    }
}
