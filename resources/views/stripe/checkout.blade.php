@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
	<div class="col-6">
		<div class="card">
			<div class="card-header">
				<h2>Checkout</h2>
			</div>
			<div class="card-body">
				@foreach($cart->products as $product)
					<div>
						{{$product->quantity}}
						{{$product->name}}
						${{toDollars($product->price)}}
					</div>
				@endforeach
			</div>
			<div class="card-body">
				Total: ${{$cart->total}}
			</div>
		</div>
		<div class="card">
			<div class="card-body">
				@include('stripe.update-payment-method')
			</div>
		</div>
	</div>
</div>
@endsection