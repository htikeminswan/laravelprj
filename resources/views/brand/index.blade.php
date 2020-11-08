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
        <a href="{{route('brand.create')}}" class="btn btn-info float-right"><i class="fas fa-plus-circle"></i> Add New</a>
        <h2>Brand List</h2>
        <table class="table  dataTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
                
            </thead> 
            <tbody>
                @php $i=1 @endphp
                @foreach($brands as $brand)
                <tr>
                    <td>{{$i++}}</td>
                    <td><img src="{{asset($brand->photo)}}" alt="brand" height="50px" width="50px" class="img-fluid">{{$brand->name}} </td>
                    
                    <td>
                        <a href="{{route('brand.edit',$brand->id)}}" class="btn btn-success">Edit</a>
                        <a href="{{route('brand.show',$brand->id)}}" class="btn btn-warning">Detail</a>
                        <form action="{{route('brand.destroy',$brand->id)}}" method="POST" class="d-inline-block" onsubmit="
                        return confirm('Are you sure want to delete?')">
                        @csrf 
                        @method ('DELETE')
                         <input type="submit" class="btn btn-danger" name="btnsubmit" value="delete">
                        </form>
                    </td>                
                </tr>
                @endforeach
            </tbody>   
        </table>  
       
         
          </div>
        </div>
      </div>
</main> 


@endsection

@section('script')
<!-- Data table plugin-->
<script type="text/javascript" src='frontend_asset/js/plugins/jquery.dataTables.min.js'></script>
<script type="text/javascript" src='frontend_asset/js/plugins/dataTables.bootstrap.min.js'></script>
<script type="text/javascript">
$('.dataTable').DataTable();
</script>
@endsection