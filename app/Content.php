<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    public $table = 'store_premium_content';
    public $fillable = [	'sid',
    						'title',
    						'description',
    						'isActive',
    						'c_uid',
    						'u_uid'
    					];
}
