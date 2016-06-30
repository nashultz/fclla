<?php

namespace FCLLA\Policies;

use Riari\Forum\Policies\ForumPolicy;

class Forum extends ForumPolicy {

    public function __construct($user)
    {
        if($user->admin != 1) {
            return false;
        }
    }

}