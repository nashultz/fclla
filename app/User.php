<?php

namespace FCLLA;

use Illuminate\Foundation\Auth\User as Authenticatable;
use FCLLA\Billing\Billable;

class User extends Authenticatable
{

    use Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'admin' => 'boolean',
    ];

    public function post()
    {
        return $this->hasMany(Post::class);
    }
}
