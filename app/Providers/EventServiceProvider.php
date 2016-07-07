<?php

namespace FCLLA\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'FCLLA\Events\ApplicationWasSubmitted' => [
            'FCLLA\Listeners\EmailUserApplication',
            'FCLLA\Listeners\EmailAdministrationUserApplicationLink',
        ],
        'FCLLA\Events\UserApplicationWasApproved' => [
            'FCLLA\Listeners\EmailUserApprovalLetter',
            'FCLLA\Listeners\ConvertApplicantToNewUser',
            'FCLLA\Listeners\AddNewUserToUnpaidMemberTable',
        ],
        'FCLLA\Events\NewUserAccountCreated' => [
            'FCLLA\Listeners\GenerateNewUserPasswordToken',
        ],
        'FCLLA\Events\UserApplicationWasDenied' => [
            'FCLLA\Listeners\RemoveUserApplication',
            'FCLLA\Listeners\EmailUserDenialLetter',
        ],
        /*'FCLLA\Events\UserHasPaidDues' => [
            'FCLLA\Listeners\RemoveUserFromUnpaidMemberTable',
            'FCLLA\Listeners\EmailUserPaymentReceipt',
            'FCLLA\Listeners\EmailAdministrationUserPaymentNotice'
        ],
        'FCLLA\Events\UserAddedToUnpaidMemberTable' => [
            'FCLLA\Listeners\CreateBillingInvoiceForUser',
            'FCLLA\Listeners\EmailUserPaymentReminderWithInvoice'
        ]*/

        'FCLLA\Flare\Events\Auth\UserRegistered' => [
            'FCLLA\Flare\Listeners\Subscription\CreateTrialEndingNotification',
        ],

        'FCLLA\Flare\Events\Subscription\UserSubscribed' => [
            'FCLLA\Flare\Listeners\Subscription\UpdateActiveSubscription',
            'FCLLA\Flare\Listeners\Subscription\UpdateTrialEndingDate',
        ],

        'FCLLA\Flare\Events\Profile\ContactInformationUpdated' => [
            'FCLLA\Flare\Listeners\Profile\UpdateContactInformationOnStripe',
        ],

        'FCLLA\Flare\Events\PaymentMethod\VatIdUpdated' => [
            'FCLLA\Flare\Listeners\Subscription\UpdateTaxPercentageOnStripe',
        ],

        'FCLLA\Flare\Events\PaymentMethod\BillingAddressUpdated' => [
            'FCLLA\Flare\Listeners\Subscription\UpdateTaxPercentageOnStripe',
        ],

        'FCLLA\Flare\Events\Subscription\SubscriptionUpdated' => [
            'FCLLA\Flare\Listeners\Subscription\UpdateActiveSubscription',
        ],

        'FCLLA\Flare\Events\Subscription\SubscriptionCancelled' => [
            'FCLLA\Flare\Listeners\Subscription\UpdateActiveSubscription',
        ],

        // Team Related Events...
        'FCLLA\Flare\Events\Teams\TeamCreated' => [
            'FCLLA\Flare\Listeners\Teams\Subscription\CreateTrialEndingNotification',
        ],

        'FCLLA\Flare\Events\Teams\Subscription\TeamSubscribed' => [
            'FCLLA\Flare\Listeners\Teams\Subscription\UpdateActiveSubscription',
            'FCLLA\Flare\Listeners\Teams\Subscription\UpdateTrialEndingDate',
        ],

        'FCLLA\Flare\Events\Teams\Subscription\SubscriptionUpdated' => [
            'FCLLA\Flare\Listeners\Teams\Subscription\UpdateActiveSubscription',
        ],

        'FCLLA\Flare\Events\Teams\Subscription\SubscriptionCancelled' => [
            'FCLLA\Flare\Listeners\Teams\Subscription\UpdateActiveSubscription',
        ],

        'FCLLA\Flare\Events\Teams\UserInvitedToTeam' => [
            'FCLLA\Flare\Listeners\Teams\CreateInvitationNotification',
        ],
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        //
    }
}
