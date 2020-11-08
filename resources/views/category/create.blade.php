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
        <a href="{{route('category.index')}}" class="btn btn-info float-right"><i class="fas fa-backward"></i></a>

        <h2>Category Form</h2>
        <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror"  name="name"> 
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>

                @enderror 
            </div>
            <div class="form-group">
                <label for="photo">photo (<small class="text-danger">* jpeg|bmp|png|jpg</small>)</label>
                <input type="file" class="form-control-file @error('photo') is-invalid @enderror" name="photo">
                @error('photo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>

                @enderror 

            </div>
            <div class="form-group">
                <input type="submit" value="save" name="btnsubmit" class="btn btn-success">
            </div>
            
                
        </form>
       
         
         </div>
        </div>
      </div>
</main> 


@endsection