@extends('layouts.audience')

@section('content')
<div class="row justify-content-center">
	<div class="col-10">
		<div class="card">
			<div class="card-header">
				Cart
				<div class="float-right">
					<a href="{{route('stripe-checkout')}}">Checkout</a>
				</div>
			</div>

			<!-- Shopping cart table -->
          	<div class="table-responsive">
            	<table class="table">
              		<thead>
                		<tr>
                  			<th scope="col" class="border-0 bg-light">
                    			<div class="p-2 px-3 text-uppercase">Product</div>
                  			</th>
                  			<th scope="col" class="border-0 bg-light">
                    			<div class="py-2 text-uppercase">Price</div>
                  			</th>
                  			<th scope="col" class="border-0 bg-light">
                    			<div class="py-2 text-uppercase">Quantity</div>
                  			</th>
                  			<th scope="col" class="border-0 bg-light">
                    			<div class="py-2 text-uppercase">Remove</div>
                  			</th>
                		</tr>
              		</thead>
              		<tbody>
              			@foreach($cart as $item)
                		<tr>
                  			<th scope="row" class="border-0">
                    			<div class="p-2">
                      				<img src="{{$item->primary()->image}}" class="img-fluid rounded shadow-sm">
                      			<div class="ml-3 d-inline-block align-middle">
                        			<h5 class="mb-0"> <a href="{{route('product-preview', ['id' => $item->id])}}" class="text-dark d-inline-block align-middle">{{$item->name}}</a>
                        			<!-- </h5><span class="text-muted font-weight-normal font-italic d-block">Category: Watches</span> -->
                      				</div>
                    			</div>
                  			</th>
                  			<td class="border-0 align-middle"><strong>${{$item->usd}}</strong></td>
                  			<td class="border-0 align-middle"><strong>{{$item->quantity}}</strong></td>
                  			<!-- add buttons that adjust quantity -->
                  			<td class="border-0 align-middle"><a href="{{route('cart.item.remove', ['itemId' => $item->id])}}" class="text-dark"><i class="fa fa-trash"></i></a></td>
                		</tr>
                		@endforeach
                		
              		</tbody>
            	</table>
          	</div>
        </div>
    </div>
</div>    
@endsection