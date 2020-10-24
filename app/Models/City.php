<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model 
{

    protected $table = 'cities';
    public $timestamps = true;
    protected $fillable = array('name');

    public function clients()
    {
        return $this->hasMany('App\Models\Client', 'city_id');
    }

    public function donationRequests()
    {
        return $this->hasMany('App\Models\DonationRequests');
    }

    public function governorate()
    {
        return $this->belongsTo('App\Models\Governorate');
    }

}