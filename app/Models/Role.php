<?php

namespace App\Models;

use Laratrust\Models\LaratrustRole;

class Role extends LaratrustRole
{
    public $guarded = [];

    protected $fillable = ['name', 'display_name' ,'description'];

    // public function users()
    // {
    //     return $this->belongsToMany('App\User');
    // }
}
