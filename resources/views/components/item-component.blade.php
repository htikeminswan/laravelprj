<!-- <div> -->
    <!-- Smile, breathe, and go slowly. - Thich Nhat Hanh -->
<!-- </div> -->
<div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                <a href="{{route('itemdetail',$item->id)}}"><img class="card-img-top" src="{{asset($item->photo)}}" alt=""></a>
                <div class="card-body">
                    <h4 class="card-title">
                    <a href="{{route('itemdetail',$item->id)}}">{{$item->name}}</a>
                    </h4>
                    <h5>{{$item->price}}MMK</h5>
                    <p class="card-text">{{$item->description}}</p>
                </div>
                <div class="card-footer">
                        <div class="row">
                        <a href="{{route('itemdetail',$item->id)}}" class="btn btn-outline-info ">Detail</a><br>
                       

                        <button type="submit" data-id="{{$item->id}}" data-code="{{$item->codeno}}"data-name="{{$item->name}}" data-photo="{{$item->photo}}" data-price="{{$item->price}}" data-discount="{{$item->discount}}"data-qty=""
                        class="btn btn-outline-info addtocartBtn mx-2" >Add Cart</button>
                        </div>  
                        <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
                </div>
 </div>