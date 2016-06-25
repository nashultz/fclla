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
    public function __construct(User $user)
    {
        $this->middleware('guest');
        
        $this->user = $user;
    }

    public function create()
    {
        
    }
}
