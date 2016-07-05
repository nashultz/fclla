<?php

namespace FCLLA\Flare\Interactions\Settings\Security;

use Exception;
use GuzzleHttp\Client as HttpClient;
use FCLLA\Flare\Services\Security\Authy;
use FCLLA\Flare\Contracts\Interactions\Settings\Security\VerifyTwoFactorAuthToken as Contract;

class VerifyTwoFactorAuthTokenUsingAuthy implements Contract
{
    /**
     * The Authy service instance.
     *
     * @var \FCLLA\Flare\Services\Security\Authy
     */
    protected $authy;

    /**
     * Create a new interaction instance.
     *
     * @param  \FCLLA\Flare\Services\Security\Authy  $authy
     * @return void
     */
    public function __construct(Authy $authy)
    {
        $this->authy = $authy;
    }

    /**
     * {@inheritdoc}
     */
    public function handle($user, $token)
    {
        return $this->authy->verify($user->authy_id, $token);
    }
}
