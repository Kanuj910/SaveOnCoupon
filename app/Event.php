<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable =  ['event','seo_url','meta_title','meta_description','meta_keywords','h1','h2','c_uid','u_uid'];
}
