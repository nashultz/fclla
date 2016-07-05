<?php

namespace FCLLA\Flare;

class Flare
{
    use Configuration\CallsInteractions,
        Configuration\ManagesApiOptions,
        Configuration\ManagesAppDetails,
        Configuration\ManagesAvailablePlans,
        Configuration\ManagesAvailableRoles,
        Configuration\ManagesAvailableProducts,
        Configuration\ManagesBillingProviders,
        Configuration\ManagesModelOptions,
        Configuration\ManagesSupportOptions,
        Configuration\ManagesTwoFactorOptions,
        Configuration\ProvidesScriptVariables;

    /**
     * Flare version
     */
    public static $version = '0.0.01';
}