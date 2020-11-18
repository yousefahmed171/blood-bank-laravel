<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{

    protected $table = 'clients';

    protected $guard = 'client';

    public $timestamps = true;
    
    protected $fillable = array('name', 'email', 'phone', 'password', 'brith_date', 'last_donation_date', 'city_id', 'blood_type_id', 'pin_code', 'active');


    public function contacts()
    {
        return $this->hasMany('App\Models\Contact', 'client_id');
    }

    public function tokens()
    {
        return $this->hasMany('App\Models\Token', 'client_id');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function posts()
    {
        return $this->belongsToMany('App\Models\Post');
    }

    public function bloodTypes()
    {
        return $this->belongsToMany('App\Models\BloodType');
    }

    public function governorates()
    {
        return $this->belongsToMany('App\Models\Governorate');
    }

    public function donationRequest()
    {
        return $this->hasMany('App\Models\DonationRequest');
    }

    public function notifications()
    {
        return $this->belongsToMany('App\Models\Notification');
    }

    protected $hidden = [
        'password', 'api_token', 'remember_token',
    ];


}