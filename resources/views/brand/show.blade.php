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
       
          <h2>Brand Detail</h2>
           

            <img src="{{asset($brand->photo)}}" class="img-fluid" alt="" height="200px" width="200px">
            <input type="hidden" value="{{$brand->photo}}">
            <p>{{$brand->name}}</p>
            <a href="{{route('brand.index')}}" class="btn btn-info">Go Back</a>

         
          </div>
        </div>
      </div>
</main> 











@endsection