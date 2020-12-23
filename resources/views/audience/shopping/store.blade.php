@foreach ($team->store->products as $product)
	<div class="row justify-content-center">
		<div class="col-10">
			<div class="card">
				<div class="card-body">
					<div><img src="{{$product->images()->first()->image}}"></div>
					<div>{{$product->name}}</div>
					<div>{{$product->description}}</div>
					<div>{{$product->price}}</div>
					<a href="{{route('cart.item.add', ['productId' => $product->id])}}">Add to cart</a>
				</div>
			</div>
		</div>
	</div>
@endforeach