<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model 
{

    protected $table = 'posts';
    public $timestamps = true;
    protected $fillable = array('title', 'img', 'content', 'category_id');

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    public function clients()
    {
        return $this->belongsToMany('App\Models\Client');
    }

}