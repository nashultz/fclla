<?php

namespace FCLLA\Flare\Events\Teams\Subscription;

class TeamSubscribed
{
    /**
     * The team instance.
     *
     * @var \FCLLA\Flare\Team
     */
    public $team;

    /**
     * The plan the team subscribed to.
     *
     * @var \FCLLA\Flare\Plan
     */
    public $plan;

    /**
     * Create a new event instance.
     *
     * @param  \FCLLA\Flare\Team  $team
     * @param  \FCLLA\Flare\Plan  $plan
     * @param  bool  $fromRegistration
     * @return void
     */
    public function __construct($team, $plan)
    {
        $this->team = $team;
        $this->plan = $plan;
    }
}
