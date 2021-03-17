@extends('stripe.checkout.layout')

@section('form')

<form class="needs-validation" novalidate="" action="{{route('stripe-payment')}}" method="post">
	@csrf

	@include('stripe.checkout.testing-payment')
	<button class="btn btn-primary btn-lg btn-block mb-3" id="card-button" type="button">Checkout</button>
</form>
	
@endsection

@push('footer-scripts')
	
@endpush