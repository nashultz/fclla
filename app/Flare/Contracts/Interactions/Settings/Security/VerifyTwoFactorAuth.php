<?php

namespace FCLLA\Flare\Contracts\Interactions\Settings\Security;


interface VerifyTwoFactorAuth
{
    /**
     * Verify a two-factor authentication token for the given user.
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  string  $token
     * @return bool
     */
    public function handle($user, $token);
}