<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GenderRule extends Model
{
    public function advertisement()
    {
        return $this->hasMany('App/Advertisement');
    }
}
