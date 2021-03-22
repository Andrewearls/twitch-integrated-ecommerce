@extends('layouts.audience')

@section('content')
<div class="row justify-content-center no-gutters">
	<div class="col-12 col-sm-10 card">
		<div class="card-body">
			<h1>Receipt</h1>

			<div class="invoice-wrapper">
					<!-- <div class="intro">
						Hi <strong>John McClane</strong>, 
						<br>
						This is the receipt for a payment of <strong>$312.00</strong> (USD) for your works
					</div> -->

					<div class="payment-info">
						<div class="row">
							<div class="col-sm-6">
								<span>Payment No.</span>
								<strong>{{$receipt->id}}</strong>
							</div>
							<div class="col-sm-6 text-sm-left text-md-right">
								<span>Payment Date</span>
								<strong>{{$receipt->checkoutTime}}</strong>
							</div>
						</div>
					</div>

					<div class="payment-details">
						<div class="row">
							<div class="col-sm-6">
								<span>Billing Address</span>
								<strong>
									{{$user->name}}
								</strong>
								<p>
									{{$user->billingAddress->address}}<br>
									@if($user->billingAddress->addressTwo)
										{{$user->billingAddress->addressTwo}} <br>
									@endif
									{{$user->billingAddress->city}} <br>
									{{$user->billingAddress->state}}<br>
									{{$user->billingAddress->zip}} <br>
									{{$user->billingAddress->country}}<br>
									<a href="#">
										{{$user->email}}
									</a>
								</p>
							</div>
							<div class="col-sm-6 text-sm-left text-md-right">
								<span>Shipping Address</span>
								<strong> </strong><br>
								<p>
									{{$user->shippingAddress->address}} <br>
									@if ($user->shippingAddress->addressTwo)
										{{$user->shippingAddress->addressTwo}} <br>
									@endif
									{{$user->shippingAddress->city}} <br>
									{{$user->shippingAddress->state}} <br>
									{{$user->shippingAddress->zip}} <br>
									{{$user->shippingAddress->country}} <br>
								</p>
							</div>
						</div>
					</div>

					<div class="line-items">
						<div class="headers clearfix">
							<div class="row">
								<div class="col-12 col-sm-4">Description</div>
								<div class="col-12 col-sm-3">Quantity</div>
								<div class="col-12 col-sm-5 text-sm-left text-md-right">Amount</div>
							</div>
						</div>
						<div class="items">
							@foreach($cart->content() as $item)
							<div class="row item">
								<div class="col-12 col-sm-4 desc">
									{{$item->name}}
								</div>
								<div class="col-12 col-sm-3 qty">
									{{$item->quantity}}
								</div>
								<div class="col-12 col-sm-5 amount text-sm-left text-md-right">
									${{toDollars($item->price)}}
								</div>
							</div>
							@endforeach
						</div>
						<div class="total text-sm-left text-md-right">
							<!-- <p class="extra-notes">
								<strong>Extra Notes</strong>
								Please send all items at the same time to shipping address by next week.
								Thanks a lot.
							</p> -->
							<div class="field">
								Subtotal <span>${{$cart->total()}}</span>
							</div>
							<div class="field">
								Shipping <span>$0.00</span>
							</div>
<!-- 							<div class="field">
								Discount <span>4.5%</span>
							</div>
 -->							<div class="field grand-total">
								Total <span>${{$cart->total()}}</span>
							</div>
						</div>

						<!-- <div class="print">
							<a href="#">
								<i class="fa fa-print"></i>
								Print this receipt
							</a>
						</div> -->
					</div>
				</div>

<!-- 			{{$receipt->user->name}}
			
			{{$receipt}}

			{{$cart->content()}}
 -->		</div>
	</div>
</div>
<!-- // this is your receipt -->
@endsection