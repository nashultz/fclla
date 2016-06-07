<?php

namespace FCLLA;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'bname', 'name', 'email', 'address', 'city', 'state', 'zipcode', 'bphone', 'hphone', 'cphone',
        'units', 'membership', 'roster'
    ];

    public function getRosterAttribute()
    {
        if($this->roster == 0)
            return 'No';
        else
            return 'Yes';
    }
}
