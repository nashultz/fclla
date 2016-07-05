<?php

namespace FCLLA\Flare\Providers;

use FCLLA\Flare\Flare;
use FCLLA\Flare\TokenGuard;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use FCLLA\Flare\Validation\StateValidator;
use FCLLA\Flare\Validation\VatIdValidator;
use FCLLA\Flare\Validation\CountryValidator;
use FCLLA\Flare\Console\Commands\InstallCommand;
use FCLLA\Flare\Console\Commands\UpdateCommand;
use FCLLA\Flare\Console\Commands\VersionCommand;
use FCLLA\Flare\Console\Commands\UpdateViewsCommand;
use FCLLA\Flare\Console\Commands\StorePerformanceIndicatorsCommand;

class FlareServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $this->defineRoutes();

        $this->defineResources();

        Validator::extend('state', StateValidator::class.'@validate');
        Validator::extend('country', CountryValidator::class.'@validate');
        Validator::extend('vat_id', VatIdValidator::class.'@validate');

        Auth::viaRequest('flare', function ($request) {
            return app(TokenGuard::class)->user($request);
        });
    }

    /**
     * Define the Flare routes.
     *
     * @return void
     */
    protected function defineRoutes()
    {
        $this->defineRouteBindings();

        // If the routes have not been cached, we will include them in a route group
        // so that all of the routes will be conveniently registered to the given
        // controller namespace. After that we will load the Flare routes file.
        if (! $this->app->routesAreCached()) {
            Route::group([
                'namespace' => 'FCLLA\Flare\Http\Controllers'],
                function ($router) {
                    require __DIR__.'/../Http/routes.php';
                }
            );
        }
    }

    /**
     * Define the Flare route model bindings.
     *
     * @return void
     */
    protected function defineRouteBindings()
    {
        Route::model('team', Flare::teamModel());

        Route::model('team_member', Flare::userModel());
    }

    /**
     * Define the resources for the package.
     *
     * @return void
     */
    protected function defineResources()
    {
        $this->loadViewsFrom(FLARE_PATH.'/resources/views', 'flare');

        $this->loadTranslationsFrom(FLARE_PATH.'/resources/lang', 'flare');

        if ($this->app->runningInConsole()) {
            $this->defineViewPublishing();

            $this->defineAssetPublishing();

            $this->defineFullPublishing();
        }
    }

    /**
     * Define the view publishing configuration.
     *
     * @return void
     */
    public function defineViewPublishing()
    {
        $this->publishes([
            FLARE_PATH.'/resources/views' => resource_path('views/vendor/flare'),
        ], 'flare-views');
    }

    /**
     * Define the asset publishing configuration.
     *
     * @return void
     */
    public function defineAssetPublishing()
    {
        $this->publishes([
            FLARE_PATH.'/resources/assets/js' => resource_path('assets/js/flare'),
        ], 'flare-js');

        $this->publishes([
            FLARE_PATH.'/resources/assets/less' => resource_path('assets/less/flare'),
        ], 'flare-less');
    }

    /**
     * Define the "full" publishing configuration.
     *
     * @return void
     */
    public function defineFullPublishing()
    {
        $this->publishes([
            FLARE_PATH.'/resources/views' => resource_path('views/vendor/flare'),
            FLARE_PATH.'/resources/assets/js' => resource_path('assets/js/flare'),
            FLARE_PATH.'/resources/assets/less' => resource_path('assets/less/flare'),
        ], 'flare-full');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        if (! defined('FLARE_PATH')) {
            define('FLARE_PATH', realpath(__DIR__.'/../../'));
        }

        if (! class_exists('Flare')) {
            class_alias('FCLLA\Flare\Flare', 'Flare');
        }

        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
                UpdateCommand::class,
                UpdateViewsCommand::class,
                StorePerformanceIndicatorsCommand::class,
                VersionCommand::class,
            ]);
        }

        $this->registerServices();
    }

    /**
     * Register the Flare services.
     *
     * @return void
     */
    protected function registerServices()
    {
        $this->registerAuthyService();

        $this->registerInterventionService();

        $services = [
            'Contracts\Http\Requests\Auth\RegisterRequest' => 'Http\Requests\Auth\StripeRegisterRequest',
            'Contracts\Http\Requests\Settings\Subscription\CreateSubscriptionRequest' => 'Http\Requests\Settings\Subscription\CreateStripeSubscriptionRequest',
            'Contracts\Http\Requests\Settings\Teams\Subscription\CreateSubscriptionRequest' => 'Http\Requests\Settings\Teams\Subscription\CreateStripeSubscriptionRequest',
            'Contracts\Http\Requests\Settings\PaymentMethod\UpdatePaymentMethodRequest' => 'Http\Requests\Settings\PaymentMethod\UpdateStripePaymentMethodRequest',
            'Contracts\Repositories\AnnouncementRepository' => 'Repositories\AnnouncementRepository',
            'Contracts\Repositories\CouponRepository' => 'Repositories\StripeCouponRepository',
            'Contracts\Repositories\NotificationRepository' => 'Repositories\NotificationRepository',
            'Contracts\Repositories\TeamRepository' => 'Repositories\TeamRepository',
            'Contracts\Repositories\TokenRepository' => 'Repositories\TokenRepository',
            'Contracts\Repositories\UserRepository' => 'Repositories\UserRepository',
            'Contracts\Repositories\LocalInvoiceRepository' => 'Repositories\StripeLocalInvoiceRepository',
            'Contracts\Repositories\PerformanceIndicatorsRepository' => 'Repositories\PerformanceIndicatorsRepository',
            'Contracts\Repositories\Geography\StateRepository' => 'Repositories\Geography\StateRepository',
            'Contracts\Repositories\Geography\CountryRepository' => 'Repositories\Geography\CountryRepository',
            'Contracts\InitialFrontendState' => 'InitialFrontendState',
            'Contracts\Interactions\Support\SendSupportEmail' => 'Interactions\Support\SendSupportEmail',
            'Contracts\Interactions\Subscribe' => 'Interactions\SubscribeUsingStripe',
            'Contracts\Interactions\SubscribeTeam' => 'Interactions\SubscribeTeamUsingStripe',
            'Contracts\Interactions\CheckPlanEligibility' => 'Interactions\CheckPlanEligibility',
            'Contracts\Interactions\CheckTeamPlanEligibility' => 'Interactions\CheckTeamPlanEligibility',
            'Contracts\Interactions\Auth\CreateUser' => 'Interactions\Auth\CreateUser',
            'Contracts\Interactions\Auth\Register' => 'Interactions\Auth\Register',
            'Contracts\Interactions\Settings\Profile\UpdateProfilePhoto' => 'Interactions\Settings\Profile\UpdateProfilePhoto',
            'Contracts\Interactions\Settings\Profile\UpdateContactInformation' => 'Interactions\Settings\Profile\UpdateContactInformation',
            'Contracts\Interactions\Settings\Teams\CreateTeam' => 'Interactions\Settings\Teams\CreateTeam',
            'Contracts\Interactions\Settings\Teams\AddTeamMember' => 'Interactions\Settings\Teams\AddTeamMember',
            'Contracts\Interactions\Settings\Teams\UpdateTeamMember' => 'Interactions\Settings\Teams\UpdateTeamMember',
            'Contracts\Interactions\Settings\Teams\SendInvitation' => 'Interactions\Settings\Teams\SendInvitation',
            'Contracts\Interactions\Settings\Security\EnableTwoFactorAuth' => 'Interactions\Settings\Security\EnableTwoFactorAuthUsingAuthy',
            'Contracts\Interactions\Settings\Security\VerifyTwoFactorAuthToken' => 'Interactions\Settings\Security\VerifyTwoFactorAuthTokenUsingAuthy',
            'Contracts\Interactions\Settings\Security\DisableTwoFactorAuth' => 'Interactions\Settings\Security\DisableTwoFactorAuthUsingAuthy',
            'Contracts\Interactions\Settings\PaymentMethod\UpdatePaymentMethod' => 'Interactions\Settings\PaymentMethod\UpdateStripePaymentMethod',
            'Contracts\Interactions\Settings\PaymentMethod\RedeemCoupon' => 'Interactions\Settings\PaymentMethod\RedeemStripeCoupon',
        ];

        foreach ($services as $key => $value) {
            $this->app->singleton('FCLLA\Flare\\'.$key, 'FCLLA\Flare\\'.$value);
        }
    }

    /**
     * Register the Authy service.
     *
     * @return void
     */
    protected function registerAuthyService()
    {
        $this->app->when('FCLLA\Flare\Services\Security\Authy')
                ->needs('$key')
                ->give(function () {
                    return config('services.authy.secret');
                });
    }

    /**
     * Register the Intervention image manager binding.
     *
     * @return void
     */
    protected function registerInterventionService()
    {
        $this->app->bind(ImageManager::class, function () {
            return new ImageManager(['driver' => 'gd']);
        });
    }
}
