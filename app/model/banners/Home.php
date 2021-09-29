<?php

namespace App\model\banners;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    public $table = 'banner_home';
    public $fillable = ['image','alt','title','link','target','isActive'];
}
