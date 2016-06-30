<?php

namespace FCLLA\Listeners;

use FCLLA\Events\NewUserAccountCreated;
use FCLLA\Http\Files\Auth\CreateNewPassword;
use FCLLA\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class GenerateNewUserPasswordToken
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserApplicationWasApproved  $event
     * @return void
     */
    public function handle(NewUserAccountCreated $event)
    {
        $user = $event->user;
        //dd($user);
        $newUser = User::create($user);
        new CreateNewPassword($newUser);
    }
}
