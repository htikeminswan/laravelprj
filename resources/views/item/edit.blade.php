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

        <h2>Item Edit Form</h2>
                        <form action="{{route('item.update',$item->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf 
                        @method ('PATCH')
                                <div class="form-group row">
                                            <label for="photo_id" class="col-sm-2 col-form-label"> Photo </label>
                                <div class="col-sm-10">

                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Old Photo</a>
                                        <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">New Photo </a>
                                    </div>
                                </nav>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <img src="{{asset($item->photo)}}" width="50px" height="50px"class="img-fluid">
                                        <input type="hidden" name="oldphoto" value="{{$item->photo}}">
                                    </div>
                                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                        
                                        <input type="file" id="photo_id" name="newphoto">
                                        
                                    </div>
                                </div>

                               </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name_id" class="col-sm-2 col-form-label"> Name </label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="name_id" name="name" value="{{$item->name}}">
                                        </div>
                                </div>
                                <div class="form-group row">
                                        <label for="categoryName" class="col-sm-2 col-form-label"> Price </label>
                                        
                                        <div class="col-sm-10">
                                            <nav>
                                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                <a class="nav-item nav-link active" id="nav-price-tab" data-toggle="tab" href="#nav-price" role="tab" aria-controls="nav-price" aria-selected="true"> Unit Price </a>
                                                
                                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"> Discount </a>
                                            </div>
                                        </nav>
                                        
                                        <div class="tab-content mt-3" id="nav-tabContent">
                                            <div class="tab-pane fade show active" id="nav-price" role="tabpanel" aria-labelledby="nav-price-tab">
                                                <input type="number" class="form-control @error('unitprice') is-invalid @enderror" id="categoryName" placeholder="Enter Unit Price" name="unitprice"
                                                value="{{$item->price}}">
                                            </div>
                                            @error('unitprice')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{$message}}</strong>
                                            </span>

                                            @enderror 
                                            
                                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                                <input type="text" class="form-control @error('discount') is-invalid @enderror" id="categoryName" placeholder="Enter Discount Price" name="discount"
                                                value="{{$item->discount}}">
                                            </div>
                                            @error('discount')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{$message}}</strong>
                                            </span>

                                            @enderror 
                                        </div>
                                        </div>
                                </div>
                               
                                 <div class="form-group row">
                                    <label for="description_id" class="col-sm-2 col-form-label"> Description </label>
                                    <div class="col-sm-10">
                                      <textarea class="form-control" name="description">{{$item->description}}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="photo_id" class="col-sm-2 col-form-label">Brand</label>
                                    <div class="col-sm-10">
                                     	<select class="form-control" name="brand">
                                         @foreach($brands as $brand)
                                            <option value="{{ $brand->id }}" {{ $item->brand_id == $brand->id ? 'selected' : ''  }}>{{ $brand->name }}</option>
                                        @endforeach
                                     	</select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="photo_id" class="col-sm-2 col-form-label">Subcategory</label>
                                    <div class="col-sm-10">
                                     	<select class="form-control" name="subcategory">
                                     		@foreach($subcategories as $subcategory)
                                             <option value="{{$subcategory->id}}" {{$item->subcategory_id==$subcategory->id? 'selected':''}}>{{$subcategory->name}}</option>

                                            @endforeach
                                             
                                     	</select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="icofont-save"></i>
                                           Edit
                                        </button>
                                    </div>
                                </div>

                        </form>
        
       
         
         </div>
        </div>
      </div>
</main> 


@endsection