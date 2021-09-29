<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    public $table = 'coupons';
    protected $fillable =  ['title','description','url','image_url','start_dt','expire_date','tn_date','freeshipping','discount','clearance','exclusive','printable','is_top_coupon','sitewide','isDeal','tn_flag','code','sid','c_uid','u_uid','discount_value'];
}
