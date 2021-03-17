@extends('stripe.checkout.layout')

@section('form')
<h4 class="mb-3">Billing address</h4>
<form class="needs-validation" novalidate="" action="{{route('submit-address')}}" method="post">
	@csrf
@include('stripe.checkout.billing-address', ['address' => $billingAddress ?? ''])
<hr class="mb-4">
@include('stripe.checkout.shipping-address', ['address' => $shippingAddress ?? ''])

<hr class="mb-4">

<button class="btn btn-primary btn-lg btn-block mb-3" id="card-button" type="submit">Continue to checkout</button>
</form>
@endsection