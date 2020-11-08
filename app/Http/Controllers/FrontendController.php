<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Category;
use App\Subcategory;

class FrontendController extends Controller
{
   public function home(){
       $items=Item::all();
      
       return view('frontend.mainpage',compact('items'));
   }
   public function itemdetail($id){
       $item=Item::find($id);
       return view('frontend.itemdetail',compact('item'));

   }
   public function signin(){
       return view('frontend.signinpage');
   }
   public function signup(){
       return view('frontend.signuppage');
   }
   public function itemsbySubcategory($id){
       $mysubcategory=Subcategory::find($id);
       return view('frontend.itemsbySubcategory',compact('mysubcategory'));
   }
   public function cart(){

    return view('frontend.cart');
   }
}
