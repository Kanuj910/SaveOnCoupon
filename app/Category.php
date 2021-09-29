<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $table = 'categories';
    protected $fillable =  ['name','seo_url','parent_id','meta_title','meta_description','meta_keywords','h1','h2','c_uid','u_uid','description'];

    public function store()
    {
        return $this->hasMany('App\Store','id');
    }

    public function childs() {
        return $this->hasMany('App\Category','parent_id','id') ;
    }

    public function stores()
    {
        return $this->belongsTo('App\Store','id');
    }
}
