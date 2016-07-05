<?php

namespace FCLLA\Flare\Providers;

use FCLLA\Flare\Flare;
use Braintree_Configuration;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Your application and company details.
     *
     * @var array
     */
    protected $details = [];

    /**
     * All of the application developer e-mail addresses.
     *
     * @var array
     */
    protected $developers = [];

    /**
     * The address where customer support e-mails should be sent.
     *
     * @var string
     */
    protected $sendSupportEmailsTo = null;

    /**
     * The available team member roles.
     *
     * @var array
     */
    protected $roles = [];

    /**
     * Indicates if two-factor authentication should be offered.
     *
     * @var bool
     */
    protected $usesTwoFactorAuth = false;

    /**
     * Indicates if the application will expose an API.
     *
     * @var bool
     */
    protected $usesApi = true;

    /**
     * All of the abilities that may be assigned to API tokens.
     *
     * @var array
     */
    protected $tokensCan = [];

    /**
     * The token abilities that should be selected by default in the UI.
     *
     * @var array
     */
    protected $byDefaultTokensCan = [];

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Flare::details($this->details);

        Flare::sendSupportEmailsTo($this->sendSupportEmailsTo);

        if (count($this->developers) > 0) {
            Flare::developers($this->developers);
        }

        if (count($this->roles) > 0) {
            Flare::useRoles($this->roles);
        }

        if ($this->usesTwoFactorAuth) {
            Flare::useTwoFactorAuth();
        }

        if ($this->usesApi) {
            Flare::useApi();
        }

        Flare::tokensCan($this->tokensCan);

        Flare::byDefaultTokensCan($this->byDefaultTokensCan);

        $this->booted();

        if (Flare::billsUsingBraintree()) {
            $this->configureBraintree();
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Configure the Braintree SDK.
     *
     * @return void
     */
    protected function configureBraintree()
    {
        Braintree_Configuration::environment(config('services.braintree.env'));
        Braintree_Configuration::merchantId(config('services.braintree.merchant_id'));
        Braintree_Configuration::publicKey(config('services.braintree.key'));
        Braintree_Configuration::privateKey(config('services.braintree.secret'));
    }
}
