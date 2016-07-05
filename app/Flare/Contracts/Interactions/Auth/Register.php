<?php

namespace FCLLA\Flare\Contracts\Interactions\Auth;

use FCLLA\Flare\Contracts\Http\Requests\Auth\RegisterRequest;

interface Register
{
    /**
     * Register a new user with the application.
     *
     * @param  \FCLLA\Flare\Http\Requests\Auth\RegisterRequest  $request
     * @return \Illuminate\Contracts\Auth\Authenticatable
     */
    public function handle(RegisterRequest $request);
}
