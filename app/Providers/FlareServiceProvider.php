<?php

namespace FCLLA\Providers;

use FCLLA\Flare\Flare;
use FCLLA\Flare\Providers\AppServiceProvider as ServiceProvider;

class FlareServiceProvider extends ServiceProvider
{
    /**
     * Application and company details
     */
    protected $details = [
        'vendor' => 'Faulkner County Landlords Association',
        'product' => '',
        'street' => '',
        'location' => '',
        'phone' => '',
    ];
    
    /**
     * The email address to customer support
     */
    protected $sendSupportEmailsTo = 'support@fclla.org';
    
    /**
     * Application developers
     */
    protected $developers = [
        'nashultz07@gmail.com'
    ];
    
    /**
     * Application exposes an API?
     */
    protected $usesApi = true;
    
    /**
     * Flare application configuration
     */
    public function booted()
    {
        Flare::useStripe()->needsCardUpFront();
    }
}