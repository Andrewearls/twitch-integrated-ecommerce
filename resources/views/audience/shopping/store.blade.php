<div class="row justify-content-center">
	@foreach($team->store->products as $product)
		@include('audience.shopping.productCard')
	@endforeach
</div>