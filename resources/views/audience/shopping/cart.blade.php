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
			@foreach($cart as $item)
				<div class="card-body">
					{{$item->name}}
					{{$item->quantity}}
					{{$item->price}}
					<a href="{{ route('cart.item.remove', ['itemId' => $item->id])}}">Remove</a>
				</div>
			@endforeach
		</div>
	</div>
</div>
// content here
@endsection