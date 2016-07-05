<?php

namespace FCLLA\Flare\Contracts\Interactions;

interface SubscribeTeam
{
    /**
     * Subscribe the team to a subscription plan.
     *
     * @param  \FCLLA\Flare\Team  $team
     * @param  \FCLLA\Flare\Plan  $plan
     * @param  array  $data
     * @return \FCLLA\Flare\Team
     */
    public function handle($team, $plan, array $data);
}
