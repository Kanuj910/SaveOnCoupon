<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoreCategory extends Model
{
	public $table = 'cat_stores';
	public $timestamps = false;
	protected $fillable =  array('cat_id','sid');

	public function stores()
	{
		return $this->belongsToMany('App\Stores');
	}
}
