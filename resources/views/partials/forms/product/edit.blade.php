<div>
    <form method="POST" action="{{ route('product-update') }}">
    	@csrf
    	<input type="text" name="name" value="{{ $product->name }}">
    	<input type="text" name="price" value="{{ $product->price }}">
    	<input type="file" name="image" value="{{ $product->image_url }}">
    	<textarea name="description">{{ $product->description }}</textarea>
    	<input type="submit" name="save">
    </form>
</div>