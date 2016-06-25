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
        $this->middleware('guest');
        
        dd($user);
    }

    public function create()
    {
        
    }
}
