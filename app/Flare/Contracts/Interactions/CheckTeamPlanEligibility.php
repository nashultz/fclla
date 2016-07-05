<?php

namespace FCLLA\Flare\Contracts\Interactions;


interface CheckTeamPlanEligibility
{
    /**
     * Determine if the team is eligible to switch to the given plan.
     * @param \FCLLA\Flare\Team $team
     * @param \FCLLA\Flare\Plan $plan
     * @return bool
     */
    public function handle($team, $plan);
}