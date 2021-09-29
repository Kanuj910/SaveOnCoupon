<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CouponCategory extends Model
{
    public $table = "cat_coupons";    
	public $timestamps = false;
    public $fillable = ['cat_id','cid'];
}
