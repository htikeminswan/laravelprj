<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
   protected $fillable=['name','photo'];
   public $timestamps=false;

   public function items(){
       return $this->belongsTo('App\item');

       
   }
}
