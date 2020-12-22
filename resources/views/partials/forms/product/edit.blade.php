<br>
<div class="row justify-content-center">
	<div class="col-10">
		<form method="POST" action="{{ route('product-update', [$product->id ?? '']) }}">
			@csrf 
			<div class="card form-group">
				<div class="card-header">
					<h2>Product Editor</h2>
				</div>
				<div class="card-body form-row">
					<div class="col-6">
					<!-- <label for="productName">Name</label> -->
						<input type="text" id="productName" class="form-control" name="name" value="{{ old('name') ?? $product->name }}" aria-describedby="productName" placeholder="Enter Product Name">
					</div>
					<div class="col-3">

					<!-- <label>Price</label> -->
						<input type="text" class="form-control" name="price" value="{{ old('price') ?? $product->price }}" aria-describedby="productPrice" placeholder="Enter Product Price">
					</div>
				</div>
			</div>

			<div class="card form-group">
				<div class="card-body row justify-content-end">
					<div class="col-6">				
						<label>Image:</label>
						<input type="file" class="form-control-file" name="image" value="{{ old('image_url') ?? $product->image_url }}">
					</div>
				</div>
			</div>

			<div class="card form-group">
				<div class="card-body row">
					<div class="col-10">				
						<label>Description</label>
						<textarea name="description" class="form-control" rows="10">{{ old('description') ?? $product->description }}</textarea>
					</div>
				</div>

				<div class="card-footer">
					<div class="col-3">
						<input type="submit" class="form-control" name="save">
					</div>
				</div>
			</div>
		</form>
	</div>
</div>