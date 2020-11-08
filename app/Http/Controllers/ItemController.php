<?php

namespace App\Http\Controllers;

use App\Item;
use App\Subcategory;
use App\Brand;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items=Item::all();
        return view('item.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subcategories=Subcategory::all();
        $brands=Brand::all();
        return view('item.create',compact('subcategories','brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      //dd($request);
        // $request->validate([
            
        //     "name"=>"required|min:5",
        //     "photo"=>"required|mimes:jpeg,bmp,png,jpg",
        //     "unitprice"=>"required",
        //     "discount" =>"required",
        //     "description"=>"required",
        //     "brand_id"   =>"required",
        //     "subcategory_id"=>"required"
            
        // ]);

        if($request->file()){
            $fileName=time().'_'.$request->photo->getClientOriginalName();
            $filePath=$request->file('photo')->storeAs('itemimg',$fileName,'public');
            $path='/storage/'.$filePath;
        }
        $codeno=mt_rand(1000000, 9999999);

        $item= Item::create(['codeno'=>$codeno,
                             'name' => $request->name,
                             'photo'=>$path,
                             'price'=>$request->unitprice,
                             'discount'=>$request->discount,
                             'description'=>$request->description,
                             'brand_id'   =>$request->brand, 
                            'subcategory_id' => $request->subcategory
                             ]);
        $item->save();
        

        return redirect()->route('item.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(item $item)
    {
        return view('item.show',compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(item $item)
    {
        $brands=Brand::all();
        $subcategories=Subcategory::all();
        return view('item.edit',compact('item','brands','subcategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, item $item)
    {
        if($request->file()){
            $fileName=time().'_'.$request->photo->getClientOriginalName();
            $filePath=$request->file('photo')->storeAs('itemimg',$fileName,'public');
            $path='/storage/'.$filePath;
        }
        else{
            $path=$path=$request->oldphoto;
        }
        $codeno='YP-'.mt_rand(1000000, 9999999);

       

       
        $item->codeno=$codeno;
        $item->name=$request->name;
        $item->photo=$path;
        $item->price=$request->unitprice;
        $item->discount=$request->discount;
        $item->description=$request->description;
        $item->brand_id=$request->brand;
        $item->subcategory_id=$request->subcategory;
        $item->save();
        

        return redirect()->route('item.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(item $item)
    {
        $item->delete();
        return back();
    }
}
