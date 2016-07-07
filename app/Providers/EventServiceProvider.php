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
