<?php

namespace FCLLA\Flare\Interactions\Settings\Teams;

use FCLLA\Flare\Flare;
use FCLLA\Flare\Events\Teams\TeamMemberAdded;
use FCLLA\Flare\Contracts\Interactions\Settings\Teams\AddTeamMember as Contract;

class AddTeamMember implements Contract
{
    /**
     * {@inheritdoc}
     */
    public function handle($team, $user, $role = null)
    {
        $team->users()->attach($user, ['role' => $role ?: Flare::defaultRole()]);

        event(new TeamMemberAdded($team, $user));
    }
}
