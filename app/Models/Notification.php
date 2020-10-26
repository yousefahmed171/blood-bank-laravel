<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model 
{

    protected $table = 'notifications';
    public $timestamps = true;
    protected $fillable = array('title', 'content', 'donation_request_id');
    
    public function clients()
    {
        return $this->belongsToMany('App\Models\Client');
    }

    public function donationRequest()
    {
        return $this->belongsTo('App\Models\DonationRequest');
    }

}