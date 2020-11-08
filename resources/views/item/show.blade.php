@extends('backend-template')
@section('content')



<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Blank Page</h1>
          <p>Start a beautiful journey here</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Blank Page</a></li>
        </ul>
      </div>
      <div class="row">     
         <div class="col-md-12">
            <div class="tile">
                        <a href="{{route('item.index')}}" class="btn btn-info float-right"><i class="fas fa-backward"></i></a>
                        <h2>Item Detail</h2>
                      <div class="row">
                        <div class="col-md-6">
                          <img src="{{asset($item->photo)}}" class="img-fluid" alt="" height="200px" width="200px">
                          <input type="hidden" value="{{$item->photo}}">           
                        </div>
                        <div class="col-md-6">
                            <h2>Description</h1>
                            <p>{{$item->description}}</p>
                        </div>
                      </div>
                        <div>
                          <br><br>
                          Code no: <b>{{$item->codeno}}</b> <br>
                          Item Name: <b>{{$item->name}}</b> <br>
                          Bran Name: <b>{{$item->withBrands->name}}</b> <br>
                          Subcategory Name: <b>{{$item->withSubcategories->name}}</b> <br>
                          
                          Price: <b>{{$item->price}}</b> <br>
                          <a href="{{route('item.index')}}" class="btn btn-info">Go Back</a>

                        </div>

         
          </div>
      </div>
  </div>
</main> 











@endsection