@extends('frontend-tamplate')

@section('content')

<div class="container">

    <div class="row">
        <div class="col-md-6 my-3">
        <img src="{{asset($item->photo)}}" class="img-fluid"alt="">
        
        </div>
        <div class="col-md-6 my-3">
            <div class="card">
                <div class="card-header">
                    <h4>{{$item->name}}</h4>
                </div>
                <div class="card-body">
                    <p>{{$item->description}}</p>
                    <p>{{$item->codeno}}</p>
                    <p><b>Original Price:</b>{{$item->price}}MMK</p>
                    <div class="quantity-select"><input type="number" name="quantity" title="Qty" class="input-text qty text" value="1"></div>

                
                </div>
                <div class="card-footer">
                    <button type="submit" data-id="{{$item->id}}" data-code="{{$item->codeno}}"data-name="{{$item->name}}" data-photo="{{$item->photo}}" data-price="{{$item->price}}" data-discount="{{$item->discount}}"data-qty=""
                    
                    
                    
                    
                    class="btn btn-outline-info addtocartBtn" >Add Cart</button>
                
                </div>
            </div>
        
        
        </div>
    
    </div>
   
  </div>


@endsection