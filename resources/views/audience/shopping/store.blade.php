<div class="row justify-content-center" id="store">
	@foreach($team->store->products as $product)
		@include('audience.shopping.productCard')
	@endforeach
</div>