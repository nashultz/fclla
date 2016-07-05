<?php

namespace FCLLA\Flare\Contracts\Interactions\Settings\Teams;

use FCLLA\Flare\Team;

interface SendInvitation
{
    /**
     * Create and mail an invitation to the given e-mail address.
     *
     * @param  \FCLLA\Flare\Team  $team
     * @param  string  $email
     * @return \FCLLA\Flare\Invitation
     */
    public function handle($team, $email);
}
