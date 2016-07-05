<?php

namespace FCLLA\Flare\Interactions\Settings\Security;

use GuzzleHttp\Client as HttpClient;
use FCLLA\Flare\Services\Security\Authy;
use FCLLA\Flare\Contracts\Interactions\Settings\Security\EnableTwoFactorAuth as Contract;

class EnableTwoFactorAuthUsingAuthy implements Contract
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
    public function handle($user, $countryCode, $phoneNumber)
    {
        $user->forceFill([
            'authy_id' => $this->authy->enable(
                $user->email, $phoneNumber, $countryCode
            ),
        ])->save();

        return $user;
    }
}
