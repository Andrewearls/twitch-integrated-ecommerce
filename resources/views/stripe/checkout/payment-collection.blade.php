@extends('stripe.checkout.layout')

@section('form')

<form class="needs-validation" novalidate="" action="{{route('stripe-payment', ['receiptId' => $receiptId])}}" method="POST">
	@csrf
	<input type="hidden" name="receiptId" value="{{$receiptId}}">

	@include('stripe.checkout.testing-payment')
	<button class="btn btn-primary btn-lg btn-block mb-3" id="card-button" type="button">Checkout</button>
</form>
	
@endsection

@push('footer-scripts')
	
@endpush