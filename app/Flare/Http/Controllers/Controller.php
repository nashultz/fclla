<?php

namespace FCLLA\Flare\Http\Controllers;

use FCLLA\Flare\Flare;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

class Controller extends BaseController
{
    use ValidatesRequests;

    /**
     * Execute the given interaction.
     *
     * This performs the common validate and handle flow of some interactions.
     *
     * @param  Request  $request
     * @param  string  $interaction
     * @param  array  $parameters
     * @return void
     */
    public function interaction(Request $request, $interaction, array $parameters)
    {
        $validator = Flare::interact($interaction.'@validator', $parameters);

        if ($validator->fails()) {
            $this->throwValidationException($request, $validator);
        }

        return Flare::interact($interaction, $parameters);
    }
}
