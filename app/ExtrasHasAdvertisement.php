<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExtrasHasAdvertisement extends Model
{
    protected $table='advertisement_extra';

    protected $fillable=["extraId"];
}
