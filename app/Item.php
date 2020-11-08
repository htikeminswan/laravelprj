<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
   protected $fillable=['codeno','name','photo','price','discount','description','brand_id','subcategory_id']; 

   public $timestamps=false;

   function withSubcategories() {
       return $this->hasOne('App\Subcategory', 'id', 'subcategory_id');
    }

    public function show($id){
       Item::with('withSubcategories')->where('subcategory_id', $id)->get(); //the output of articles of the category
    }

    function withBrands() {
      return $this->hasOne('App\Brand', 'id', 'brand_id');
   }

   public function showone($id){
      Item::with('withBrands')->where('brand_id', $id)->get(); //the output of articles of the category
   }
   public function subcategory(){
      return $this->belongsTo('App\Subcategory');
   }
   public function orders()
  {
      return $this->belongsToMany('App\Order','orderdetails')
                  ->withPivot('quantity')
                  ->withTimestamps();
  }
}
