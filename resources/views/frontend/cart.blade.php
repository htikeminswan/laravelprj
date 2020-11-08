@extends('frontend-tamplate')

@section('content')

<div class="jumbotron jumbotron-fluid subtitle">
  		<div class="container">
    		<h1 class="text-center text-dark"> Your Shopping Cart </h1>
  		</div>
	</div>
	
	<!-- Content -->
	<div class="container mt-5">
		
		<!-- Shopping Cart Div -->
		<div class="row mt-5 shoppingcart_div">
			<div class="col-12">
				<a href="{{route('mainpage')}}" class="btn mainfullbtncolor btn-secondary float-right px-3" > 
					<i class="icofont-shopping-cart"></i>
					Continue Shopping 
				</a>
			</div>
		</div>

		<div class="row mt-5 shoppingcart_div">
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th colspan="3"> Product </th>
							<th colspan="3"> Qty </th>
							<th> Price </th>
							<th> SubTotal</th>
						</tr>
					</thead>
					<tbody id="shoppingcart_table">
					</tbody>
					<tfoot id="shoppingcart_tfoot">
						<tr>
							<td>
								
							</td>
							<td colspan="8">
								<h3 class="text-right"> Total : <span class="cartTotal"></span> </h3>
							</td>
						</tr>
						<tr> 
						<form method="post" action="{{route('order.store')}}">
       					 @csrf
							<td colspan="5"> 
								<textarea class="form-control" id="notes" placeholder="Any Request..." required="required"></textarea>
							</td>
							<td colspan="3">
								@role('customer')
								<button class="btn btn-secondary btn-block mainfullbtncolor checkoutbtn"> 
									Check Out 
								</button>
								@else
								<button class="btn btn-secondary btn-block mainfullbtncolor checkoutbtn"> 
								Sign in to Check Out 
								</button>
							   @endrole
								
									
							</td>
						</form>
						
						</tr>
					</tfoot>
				</table>
			</div>
		</div>

		<!-- No Shopping Cart Div -->
		<div class="row mt-5 noneshoppingcart_div text-center">
			
			<div class="col-12">
				<h5 class="text-center"> There are no items in this cart </h5>
			</div>

			<div class="col-12 mt-5 ">
				<a href="{{route('mainpage')}}" class="btn btn-secondary mainfullbtncolor px-3" > 
					<i class="icofont-shopping-cart"></i>
					Continue Shopping 
				</a>
			</div>

		</div>
		

	</div>
	


@endsection



