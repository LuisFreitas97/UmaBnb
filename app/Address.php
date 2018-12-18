<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public function postalCode()
    {
        return $this->hasOne('App/PostalCode');
    }

    public function user()
    {
        return $this->hasOne('App/User');
    }

    public function advertisement()
    {
        return $this->hasOne('App/Advertisement');
    }
}
