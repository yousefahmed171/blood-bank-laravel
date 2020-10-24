<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Token extends Model
{

    protected $table = 'tokens'; 
    public $timestamps = true;
    protected $fillable = array('token', 'type', 'client_id');

    public function client()
    {
        return $this->belongsTo('App\Models\Client', 'client_id'); 
    }
}



  