<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdvertisementType extends Model
{
    public function advertisements()
    {
        return $this->hasMany('App/Advertisement');
    }
}
