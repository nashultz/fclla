<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Policies
    |--------------------------------------------------------------------------
    |
    | Here we specify the policy classes to use. Change these if you want to
    | extend the provided classes and use your own instead.
    |
    */

    'policies' => [
        'forum' => FCLLA\Policies\Forum::class,
        'model' => [
            Riari\Forum\Models\Category::class  => FCLLA\Policies\Category::class,
            Riari\Forum\Models\Thread::class    => Riari\Forum\Policies\ThreadPolicy::class,
            Riari\Forum\Models\Post::class      => Riari\Forum\Policies\PostPolicy::class
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Application user model
    |--------------------------------------------------------------------------
    |
    | Your application's user model.
    |
    */

    'user_model' => FCLLA\User::class,

    /*
    |--------------------------------------------------------------------------
    | Application user name
    |--------------------------------------------------------------------------
    |
    | The attribute to use for the username.
    |
    */

    'user_name' => 'name',

];
