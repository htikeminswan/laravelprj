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
        <a href="{{route('item.create')}}" class="btn btn-info float-right"><i class="fas fa-plus-circle"></i> Add New</a>
        <h2>Item List</h2>
        <table class="table  dataTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Brand</th>
                    <th>Subcategory</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
                
            </thead> 
            <tbody>
               @php $i=1 @endphp
               @foreach($items as $item)
               
                <tr>
                    <td>{{$i++}}</td>
                    <td> <img src="{{asset($item->photo)}}" alt="items" class="img-fluid" width="50px" height="50px">{{$item->name}}</td>
                    <td>{{$item->withBrands->name}}</td>
                    <td>{{$item->withSubcategories->name}}</td>
                    <td>
                    @if($item->discount > 0)
                    {{number_format($item->discount)}}
                    @else
                      {{number_format($item->price)}}
                    @endif 
                    </td>
                    <td>
                        <a href="{{route('item.edit',$item->id)}}" class="btn btn-success">Edit</a>
                        <a href="{{route('item.show',$item->id)}}" class="btn btn-warning">Detail</a>
                        <form action="{{route('item.destroy',$item->id)}}" method="POST" class="d-inline-block" onsubmit="
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