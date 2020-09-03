@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
	<div class="col-6">
		<div class="card">
			<div class="card-header">
				<h2>Checkout</h2>
			</div>
			<div class="card-body">
				@include('stripe.update-payment-method')
			</div>
		</div>
	</div>
</div>
@endsection