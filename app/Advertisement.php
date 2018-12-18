<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;
use Illuminate\Support\Facades\Validator;

class Advertisement extends Model
{
    protected $attributes = [
        'needsSecurityDeposit' => '0',
        'landlordResides' => '0',
        'providesInvoice' => '0'
    ];

    public function bookMarks()
    {
        return $this->hasMany('App\BookMark');
    }

    public function extras()
    {
        return $this->belongsToMany('App\Extra')->withTimestamps();
    }

    public function stuffing_items()
    {
        return $this->belongsToMany('App\StuffingItem')->withTimestamps();
    }    

    public function typologies()
    {
        return $this->belongsTo('App\Typology', "typology");
    }

    public function advertisementType()
    {
        return $this->belongsTo('App\AdvertisementType', "type");
    }

    public function genderRule()
    {
        return $this->belongsTo('App\GenderRule', "genderRuleId");
    }

    public function user()
    {
        return $this->belongsTo('App\User', "user_id");
    }

    protected $fillable=['title','description','address','areaB','areaU','anoConstrucao', 'qtdWC','isPrivate','latitude','longitude','price','type','needsSecurityDeposit','landlordResides','providesInvoice','typology','genderRuleId'];
}