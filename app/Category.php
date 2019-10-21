<?php
 
namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
     protected $table = "categories";

    public function user()
    {
        return $this->belongsTo('App\User','added_by','id');
    }

    public function product()
    { 
    	
       return $this->hasMany('App\Product','cat_id','id');
    }

}
 