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
        <a href="{{route('category.create')}}" class="btn btn-info float-right"><i class="fas fa-plus-circle"></i> Add New</a>
        <h2>Category List</h2>
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
                @foreach($categories as $category)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$category->name}}</td>
                    
                    <td>
                        <a href="{{route('category.edit',$category->id)}}" class="btn btn-success">Edit</a>
                        <a href="{{route('category.show',$category->id)}}" class="btn btn-warning">Detail</a>
                        <form action="{{route('category.destroy',$category->id)}}" method="POST" class="d-inline-block" onsubmit="
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
</main>  -->


@endsection

@section('script')
<!-- Data table plugin-->
<script type="text/javascript" src='frontend_asset/js/plugins/jquery.dataTables.min.js'></script>
<script type="text/javascript" src='frontend_asset/js/plugins/dataTables.bootstrap.min.js'></script>
<script type="text/javascript">
$('.dataTable').DataTable();
</script>
@endsection