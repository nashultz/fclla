<?php

namespace FCLLA\Flare\Events\Teams;

class TeamMemberRemoved
{
    /**
     * The team instance.
     *
     * @var \FCLLA\Flare\Team
     */
    public $team;

    /**
     * The team member instance.
     *
     * @var mixed
     */
    public $member;

    /**
     * Create a new event instance.
     *
     * @param  \FCLLA\Flare\Team  $team
     * @param  mixed  $member
     * @return void
     */
    public function __construct($team, $member)
    {
        $this->team = $team;
        $this->member = $member;
    }
}
