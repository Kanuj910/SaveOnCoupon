<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscribe extends Model
{
	public $table = "subscribers";
    protected $fillable =  array('sid','email','content','ip','source','vcode','status');
}
