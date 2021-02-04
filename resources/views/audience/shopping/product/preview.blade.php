@extends('layouts.audience')

@section('content')
	<div class="row justify-content-center">
		<div class="col-10">
			<div class="card p-2" id="product_preview">
				<div class="row justify-content-between">
					<!-- if($images->count() > 1) -->
					<div class="col-2 carosel">
						@foreach ($images as $image)
							<div class="border d-flex justify-content-center p-1 shadow-sm">
								<img src="{{$image->image}}">
							</div>
						@endforeach
					</div>
					<!-- endif -->
					<div class="col-4 border d-flex justify-content-center shadow">
						<img src="{{$images->first()->image}}">
					</div>
					<div class="col-6">
						<div class="col-12 pb-2">
							<h1>{{$product->name}}</h1>
						</div>
						<div class="col-12 pb-4 border-bottom">
							<h2>${{$product->usd}}</h2>
						</div>
						<div class="col-12 border-bottom py-2">
							{{$product->description}}
						</div>
						<div class="row pt-2 pl-3 ">
							<!-- <div class="col-3">
								Quantitiy
							</div> -->
							<div class="col-3 py-2">
								<a class="button" href="{{route('cart.item.add', ['productId' => $product->id])}}" >Add to Cart</a> 
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection