<?php

namespace FCLLA\Flare\Interactions;

class SubscribeTeamUsingBraintree extends SubscribeTeam
{
    /**
     * The token field to be used during subscription.
     *
     * @var string
     */
    protected $token = 'braintree_token';
}
