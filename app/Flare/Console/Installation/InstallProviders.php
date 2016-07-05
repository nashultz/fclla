<?php

namespace FCLLA\Flare\Console\Installation;

class InstallProviders
{
    /**
     * The console command instance.
     *
     * @var \Illuminate\Console\Command  $command
     */
    protected $command;

    /**
     * Create a new installer instance.
     *
     * @param  \Illuminate\Console\Command  $command
     * @return void
     */
    public function __construct($command)
    {
        $this->command = $command;

        $this->command->line('Installing Service Providers: <info>✔</info>');
    }

    /**
     * Install the components.
     *
     * @return void
     */
    public function install()
    {
        copy(
            $this->getEventProvider(),
            app_path('Providers/EventServiceProvider.php')
        );

        copy(
            FLARE_STUB_PATH.'/app/Providers/RouteServiceProvider.php',
            app_path('Providers/RouteServiceProvider.php')
        );

        copy(
            $this->getFlareProvider(),
            $providerPath = app_path('Providers/FlareServiceProvider.php')
        );
    }

    /**
     * Get the path to the proper event service provider.
     *
     * @return string
     */
    protected function getEventProvider()
    {
        return $this->command->option('braintree')
                        ? FLARE_STUB_PATH.'/app/Providers/BraintreeEventServiceProvider.php'
                        : FLARE_STUB_PATH.'/app/Providers/EventServiceProvider.php';
    }

    /**
     * Get the path to the proper Flare service provider.
     *
     * @return string
     */
    protected function getFlareProvider()
    {
        if ($this->command->option('braintree')) {
            return $this->getBraintreeFlareProvider();
        }

        return $this->command->option('team-billing')
                        ? FLARE_STUB_PATH.'/app/Providers/FlareTeamBillingServiceProvider.php'
                        : FLARE_STUB_PATH.'/app/Providers/FlareServiceProvider.php';
    }

    /**
     * Get the path to the proper Braintree Flare service provider.
     *
     * @return string
     */
    protected function getBraintreeFlareProvider()
    {
        return $this->command->option('team-billing')
                        ? FLARE_STUB_PATH.'/app/Providers/FlareBraintreeTeamBillingServiceProvider.php'
                        : FLARE_STUB_PATH.'/app/Providers/FlareBraintreeServiceProvider.php';
    }
}
