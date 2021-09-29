<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Network extends Model
{
    public $table = 'networks';
    protected $fillable =  ['name','url','tracking_id','c_uid','u_uid'];

    public function store()
    {
    	return $this->hasMany('App\Network','id');
    }
}
