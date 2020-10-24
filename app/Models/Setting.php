<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model 
{

    protected $table = 'settings';
    public $timestamps = true;
    protected $fillable = array('notification_setting_post', 'about_app', 'phone', 'email', 'fs_link', 'ins_link', 'tw_link', 'yt_link');

}