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
          <a href="{{route('subcategory.index')}}" class="btn btn-info float-right"><i class="fas fa-backward"></i></a>
          <h2>Subcategory Detail</h2>
           
           
            
          <div>
          <br><br>
         
          Subcategory Name: <b>{{$subcategory->name}}</b> <br>
          Category Name: <b>{{$subcategory->withCategories->name}}</b> <br>
          <a href="{{route('subcategory.index')}}" class="btn btn-info">Go Back</a>

          </div>

         
          </div>
        </div>
      </div>
</main> 











@endsection