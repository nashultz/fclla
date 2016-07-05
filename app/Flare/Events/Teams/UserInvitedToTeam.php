<?php

namespace FCLLA\Flare\Events\Teams;

class UserInvitedToTeam
{
    /**
     * The team instance.
     *
     * @var \FCLLA\Flare\Team
     */
    public $team;

    /**
     * The user instance.
     *
     * @var mixed
     */
    public $user;

    /**
     * Create a new event instance.
     *
     * @param  \FCLLA\Flare\Team  $team
     * @param  mixed  $user
     * @return void
     */
    public function __construct($team, $user)
    {
        $this->team = $team;
        $this->user = $user;
    }
}
