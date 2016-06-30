<?php

namespace FCLLA\Policies;

use Riari\Forum\Policies\CategoryPolicy;

class Category extends CategoryPolicy {

    public function __construct($user, Category $category)
    {
        if($user->admin != 1) {
            return false;
        }
    }

}