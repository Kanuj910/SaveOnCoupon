<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryCoupon extends Model
{
	public $table = 'cat_coupons';
	public $timestamps = false;
	protected $fillable =  array('cat_id','cid');
}
