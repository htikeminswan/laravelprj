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

        <h2>Subcategory Edit Form</h2>
        <form action="{{route('subcategory.update',$subcategory->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
            <div class="form-group row">
                <label for="name">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror"  name="name" value="{{$subcategory->name}}"> 
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>

                @enderror 
            </div>
            <div class="form-group row">
                <label for="c_name">Category</label>
                <select  id="category" name="category" class="form-control">
               
                @foreach($categories as $cate)
                    <option value="{{ $cate->id }}" {{ $subcategory->category_id == $cate->id ? 'selected' : ''  }}>{{ $cate->name }}</option>
                @endforeach

            </div>
           
            <div class="form-group">
                <input type="submit" value="Edit" name="btnsubmit" class="btn btn-success">
            </div>
            
                
        </form>
       
         
         </div>
        </div>
      </div>
</main> 


@endsection