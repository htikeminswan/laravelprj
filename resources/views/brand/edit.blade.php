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
       
          <a href="{{route('brand.index')}}" class="btn btn-info float-right"><i class="fas fa-backward"></i></a>
          <h2>Brand Edit Form</h2>
        
        <form action="{{route('brand.update',$brand->id)}}" method="POST" enctype="multipart/form-data">
         @csrf
         @method('PUT') 
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" value="{{$brand->name}}">  
            </div>



            <div class="form-group">
                <label for="photo">photo(<small class="text-danger">* jpeg|bmp|png|jpg</small>)</label>

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#old" role="tab" aria-controls="home" aria-selected="true">Old</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#new" role="tab" aria-controls="profile" aria-selected="false">New</a>
                    </li>
                   
                    </ul>
                    <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="old" role="tabpanel" aria-labelledby="home-tab">
                    <img src="{{asset($brand->photo)}}" alt="" class="img-fluid" height="100px" width="100px">
                    <input type="hidden" name="oldphoto" value="{{$brand->photo}}">
                    </div>
                    <div class="tab-pane fade" id="new" role="tabpanel" aria-labelledby="profile-tab">
                    <input type="file" class="form-control-file @error('photo') is-invalid @enderror " name="photo">
                        @error('photo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>

                        @enderror 
                    
                    </div>
   
                    </div>            
            </div>
            <div class="form-group">
               <input type="submit" value="Edit" class="btn btn-info">
            </div>
            
                  
         </form>
          </div>
        </div>
      </div>
</main> 

@endsection