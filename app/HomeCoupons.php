<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeCoupons extends Model
{
    public $table = 'home_coupons';
	public $timestamps = false;
	protected $fillable =  ['sid','cid'];
}
