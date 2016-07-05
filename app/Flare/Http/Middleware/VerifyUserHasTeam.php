<?php

namespace FCLLA\Flare\Http\Middleware;

use FCLLA\Flare\Flare;

class VerifyUserHasTeam
{
    /**
     * Verify the incoming request's user belongs to team.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Illuminate\Http\Response
     */
    public function handle($request, $next)
    {
        if (Flare::usesTeams() && $request->user() && ! $request->user()->hasTeams()) {
            return redirect('missing-team');
        }

        return $next($request);
    }
}
