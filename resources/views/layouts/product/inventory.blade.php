@extends('layouts.admin')

@section('content')
<br>
<div class="row justify-content-center">
	<div class="col-10">
		<div class="card">
			<div class="card-header">
				Create New Product
			</div>
			<div class="card-body">
				<a href="{{route('product-create')}}">Create a product</a>
			</div>
		</div>
		<div class="card">
			<div class="card-header">
				<h2>Inventory</h2>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-4">
						Name
					</div>
					<div class="col-2">
						Price
					</div>
					<div class="col-2">
						Status
					</div>
					<div class="col-2">
						Edit
					</div>
					<div class="col-2">
						Delete
					</div>
				</div>
				@foreach($products as $product)
					<div class="row">
						<div class="col-4">
							{{ $product->name }}
						</div>
						<div class="col-2">
							{{ $product->price }}
						</div>
						<div class="col-2">
							{{ $product->status }}
						</div>
						<div class="col-2">
							<a href="{{ route('product-edit', [$product->id]) }}" class="">Edit</a>
						</div>
						<div class="col-2">
							<a href="{{ route('product-delete', [$product->id]) }}">X</a>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
</div>
// Please be consistant and use the dashboard layout --Andrew

@endsection