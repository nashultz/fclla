<?php

namespace FCLLA\Http\Files\Auth;

use FCLLA\User;

class CreateNewPassword
{
    public $user;
    /**
     * CreateNewPassword constructor.
     * @param User $user
     */
    public function __construct($user)
    {
        dd($user);
    }

    public function create()
    {
        
    }
}
