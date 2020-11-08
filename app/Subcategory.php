<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $fillable=['name','category_id'];
    
    public $timestamps=false;

    function withCategories() {
        return $this->hasOne('App\Category', 'id', 'category_id');
     }
 
     public function show($id){
        Subcategory::with('withCategories')->where('category_id', $id)->get(); //the output of articles of the category
     }

     

     public function items(){
         return $this->hasMany('App\item');
 
         
     }
 }
   

