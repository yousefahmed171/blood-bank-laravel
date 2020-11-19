<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


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
        return $this->belongsTo('App\Models\BloodType');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function notifications()
    {
        return $this->hasMany('App\Models\Notification');
    }

    public function scopeFilter($query, Request $request)
    {
        if ($request->bloodtype) {
            $query->whereBlood_type_id($request->bloodtype);
        }

        if ($request->city) {
            $query->whereCity_id($request->city);
        }
        return $query->get();
    }



}