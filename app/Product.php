<?php
 
namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
protected $table = "products";

   public function category()
    {
         return $this->belongsTo(Category::class,'cat_id');
    }

    public function user()
    {
    	return $this->belongsto('App\User','added_by','id');
    }
}
