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

        <h2>Item Form</h2>
                        <form action="{{route('item.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                                <div class="form-group row">
                                    <label for="photo_id" class="col-sm-2 col-form-label"> Photo (<small class="text-danger">* jpeg|bmp|png|jpg</small>)</label>
                                        <div class="col-sm-10">
                                            <input type="file" id="photo_id" name="photo">
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name_id" class="col-sm-2 col-form-label"> Name </label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name_id" name="name">
                                        </div>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{$message}}</strong>
                                            </span>

                                        @enderror 
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
                                                <input type="number" class="form-control @error('unitprice') is-invalid @enderror" id="categoryName" placeholder="Enter Unit Price" name="unitprice">
                                            </div>
                                            @error('unitprice')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{$message}}</strong>
                                            </span>

                                            @enderror 
                                            
                                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                                <input type="text" class="form-control @error('discount') is-invalid @enderror" id="categoryName" placeholder="Enter Discount Price" name="discount">
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
                                      <textarea class="form-control @error('description') is-invalid @enderror" name="description"></textarea>
                                    </div>
                                    @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{$message}}</strong>
                                            </span>

                                    @enderror 
                                </div>

                                <div class="form-group row">
                                    <label for="photo_id" class="col-sm-2 col-form-label">Brand</label>
                                    <div class="col-sm-10">
                                     	<select class="form-control @error('brand') is-invalid @enderror" name="brand">
                                     		@foreach($brands as $brand)
                                     		
                                             <option value="{{ $brand->id }}" class='parent-{{ $brand->id }} brand'>{{ $brand->name }}</option>
                                             @endforeach
                                     	</select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="photo_id" class="col-sm-2 col-form-label">Subcategory</label>
                                    <div class="col-sm-10">
                                     	<select class="form-control @error('subcategory') is-invalid @enderror" name="subcategory">
                                     		@foreach($subcategories as $subcategory)
                                            
                                            <option value="{{ $subcategory->id }}" class='parent-{{ $subcategory->id }} subcategory'>{{ $subcategory->name }}</option>

                                            @endforeach
                                     	</select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <input type="submit" class="btn btn-primary" value="Save">
                                            <i class="icofont-save"></i>
                                           
                                       
                                    </div>
                                </div>

                        </form>
        
       
         
         </div>
        </div>
      </div>
</main> 


@endsection