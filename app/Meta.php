<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
	public $fillable = ['meta_title','meta_description','meta_keywords','h1','h2','u_uid'];
}
