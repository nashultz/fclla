<?php

namespace FCLLA\Flare\Interactions;

use FCLLA\Flare\Contracts\Interactions\CheckTeamPlanEligibility as Contract;

class CheckTeamPlanEligibility implements Contract
{
    /**
     * {@inheritdoc}
     */
    public function handle($team, $plan)
    {
        return true;
    }
}
