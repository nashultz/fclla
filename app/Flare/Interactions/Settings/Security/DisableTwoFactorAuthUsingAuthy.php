<?php

namespace FCLLA\Flare\Interactions\Settings\Security;

use GuzzleHttp\Client as HttpClient;
use FCLLA\Flare\Services\Security\Authy;
use FCLLA\Flare\Contracts\Interactions\Settings\Security\DisableTwoFactorAuth as Contract;

class DisableTwoFactorAuthUsingAuthy implements Contract
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
    public function handle($user)
    {
        $this->authy->disable($user->authy_id);

        $user->forceFill([
            'authy_id' => null,
        ])->save();

        return $user;
    }
}
