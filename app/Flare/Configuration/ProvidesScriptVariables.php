<?php

namespace FCLLA\Flare\Configuration;

use FCLLA\Flare\Flare;
use Laravel\Cashier\Cashier;
use Illuminate\Support\Facades\Auth;
use FCLLA\Flare\Contracts\InitialFrontendState;
use Braintree\ClientToken as BraintreeClientToken;

trait ProvidesScriptVariables
{
    /**
     * Get the default JavaScript variables for Flare.
     *
     * @return array
     */
    public static function scriptVariables()
    {
        return [
            'braintreeMerchantId' => config('services.braintree.merchant_id'),
            'braintreeToken' => Flare::billsUsingBraintree() ? BraintreeClientToken::generate() : null,
            'cardUpFront' => Flare::needsCardUpFront(),
            'collectsBillingAddress' => Flare::collectsBillingAddress(),
            'collectsEuropeanVat' => Flare::collectsEuropeanVat(),
            'csrfToken' => csrf_token(),
            'currencySymbol' => Cashier::usesCurrencySymbol(),
            'env' => config('app.env'),
            'roles' => Flare::roles(),
            'state' => Flare::call(InitialFrontendState::class.'@forUser', [Auth::user()]),
            'stripeKey' => config('services.stripe.key'),
            'userId' => Auth::id(),
            'usesApi' => Flare::usesApi(),
            'usesBraintree' => Flare::billsUsingBraintree(),
            'usesTeams' => Flare::usesTeams(),
            'usesStripe' => Flare::billsUsingStripe(),
        ];
    }
}
