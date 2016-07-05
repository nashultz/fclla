<?php

namespace FCLLA\Flare\Contracts\Interactions\Settings\Teams;

interface AddTeamMember
{
    /**
     * Add a user to the given team.
     *
     * @param  \FCLLA\Flare\Team  $team
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  string|null  $role
     * @return \FCLLA\Flare\Team
     */
    public function handle($team, $user, $role = null);
}
