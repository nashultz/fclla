<?php

namespace FCLLA;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'bname', 'name', 'email', 'address', 'city', 'state', 'zipcode', 'bphone', 'hphone', 'cphone',
        'units', 'membership', 'roster'
    ];

    public function getOnRosterAttribute()
    {
        if($this->roster == 0)
            return 'No';
        else
            return 'Yes';
    }

    public function getIsRenewalAttribute()
    {
        if($this->membership == 0)
            return 'No';
        else
            return 'Yes';
    }
}
