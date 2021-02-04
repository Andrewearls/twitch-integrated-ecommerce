<!-- <div class="card">
	<div class="card-body">
		<div><img src="{{$product->images()->first()->image}}"></div>
		<div>{{$product->name}}</div>
		<div>{{$product->description}}</div>
		<div>{{$product->price}}</div>
		<a href="{{route('cart.item.add', ['productId' => $product->id])}}">Add to cart</a>
	</div>
</div> -->
<!-- Card-->
<div class="col-4 mb-3">
	<div class="card product-card rounded shadow-sm border-0">
	    <div class="card-body p-4"><img src="{{$product->images()->first()->image}}" alt="" class="img-fluid d-block mx-auto mb-3">
	        <h5> <a href="{{route('product-preview', ['id' => $product->id])}}" class="text-dark">{{$product->name}}</a></h5>
	        <p class="small text-muted font-italic">{{limitChars($product->description, 100)}}</p>
	        <div class="row justify-content-between">
	        	<div class="col-4">
	        		<a href="{{route('cart.item.add', ['productId' => $product->id])}}">Add to cart</a>
	        	</div>
	        	<div class="col-3">
	        		<h6>${{$product->usd}}</h6>
	        	</div>
	        </div>
	        
	        <!-- <ul class="list-inline small">
	            <li class="list-inline-item m-0"><i class="fas fa-star text-success"></i></li>
	            <li class="list-inline-item m-0"><i class="fas fa-star text-success"></i></li>
	            <li class="list-inline-item m-0"><i class="fas fa-star text-success"></i></li>
	            <li class="list-inline-item m-0"><i class="fas fa-star text-success"></i></li>
	            <li class="list-inline-item m-0"><i class="fas fa-star-o text-success"></i></li>
	        </ul> -->
	    </div>
	</div>
</div>