<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = 'stores';
    protected $fillable =  ['title','domain','url','image_url','description','seo_url','owsid','apiid','meta_title','meta_description','meta_keywords','h1','h2','IsActive','nid','c_uid','u_uid','cid','discount_value','video_url','banner'];

    public function category()
    {
    	return $this->hasMany('App\Category','id');
    }

    public function network()
    {
    	return $this->belongsTo('App\Network','id');
    }

}
