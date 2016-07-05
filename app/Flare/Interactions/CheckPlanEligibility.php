<?php

namespace FCLLA\Flare\Interactions;

use FCLLA\Flare\Contracts\Interactions\CheckPlanEligibility as Contract;

class CheckPlanEligibility implements Contract
{
    /**
     * {@inheritdoc}
     */
    public function handle($user, $plan)
    {
        return true;
    }
}
