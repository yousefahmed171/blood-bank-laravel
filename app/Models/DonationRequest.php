<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonationRequest extends Model 
{

    protected $table = 'donation_requests';
    public $timestamps = true;
    protected $fillable = array('name', 'age', 'bags', 'hospital_address', 'phone', 'details', 'latitude', 'longitude', 'blood_type_id', 'city_id');

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

    public function bloodType()
    {
        return $this->belongsTo('App\Models\BloodTybe');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function notifications()
    {
        return $this->hasMany('App\Models\Notification');
    }




}