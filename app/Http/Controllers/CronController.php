<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class CronController extends Controller
{
    public function discount()
    {

    	DB::table('store_discounts')->truncate();

    	$q = "discount_value, sid,IF(discount_value LIKE 'a:3:{i:0;s:1:\"\%%',REPLACE(discount_value,'1:\"%','1'),IF(discount_value LIKE 'a:3:{i:0;s:1:\"₹%',REPLACE(discount_value,'1:\"₹','1'),IF(discount_value LIKE 'a:3:{i:0;s:7:\"\&#8377%',REPLACE(discount_value,'7:\"&#8377;','1'),0))) as curr";

		$res = DB::table('coupons')->select(DB::raw($q))
			->where(function($q) {
				$q->where('coupons.expire_date','>=',date('Y-m-d'))
				->orWhere('coupons.expire_date', '0000-00-00');
			})
			->where(function($q) {
				$q->where('coupons.start_dt','<=',date('Y-m-d'))
				->orWhere('coupons.start_dt', '0000-00-00');
			})
			->orderBy('curr')
			->orderBy('sid')
			->get();

		$categories = array();
		foreach($res as $key){
		    $categories[$key->sid] = array('id' => $key->sid, 'discount' => $key->discount_value);
		}

		// dd($categories);

		DB::table('store_discounts')->insert($categories);

    }
}
