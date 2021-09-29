<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventCoupon extends Model
{
    public $table = 'eve_coupons';
	public $timestamps = false;
	protected $fillable =  array('cat_id','eid');
}
