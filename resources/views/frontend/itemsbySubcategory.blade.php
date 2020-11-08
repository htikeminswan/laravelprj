@extends('frontend-tamplate')

@section('content')

<div class="container">

    <div class="row my-4">

      <div class="col-lg-3">

      <x-sidebar-component></x-sidebar-component>


      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

      
        <div class="col-md-12">
            <h5>Filter By:{{$mysubcategory->name}}</h5>
        </div>
        <div class="row">
            @foreach($mysubcategory->items as $item)
              <x-item-component :item="$item"></x-item-component>
            @endforeach
         
        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>




@endsection


