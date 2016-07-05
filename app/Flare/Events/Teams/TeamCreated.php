<?php

namespace FCLLA\Flare\Events\Teams;

class TeamCreated
{
    /**
     * The team instance.
     *
     * @var \FCLLA\Flare\Team
     */
    public $team;

    /**
     * Create a new event instance.
     *
     * @param  \FCLLA\Flare\Team  $team
     * @return void
     */
    public function __construct($team)
    {
        $this->team = $team;
    }
}
