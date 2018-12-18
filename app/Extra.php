<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Extra extends Model
{
    public function advertisements()
    {
        return $this->belongsToMany('App\Advertisement');
    }
}
