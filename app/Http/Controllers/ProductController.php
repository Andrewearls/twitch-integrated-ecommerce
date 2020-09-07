<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductFormValidator as Validator;
use App\Product;

class ProductController extends Controller
{
    /**
     * display list of products.
     *
     * @return view
     */
    public function index($id)
    {
    	//return product view
    	return Product::find($id);
    }

    /**
     * return veiw for creating product.
     *
     * @return view
     */
    public function create()
    {
    	$product = new Product;
    	return view('layouts.product.edit', [
    		'product' => $product,
    	]);
    }

    /**
     * update a product.
     *
     * @param Request
     * @param id
     * @return redirect
     */
    public function update(Validator $request, $id = null)
    {
    	$product = new Product;

    	if (!empty($id)) {
    		$product = Product::find($id);
    		
    	}

    	// $product->user_id = $request->user->id;
    	$product->user_id = 1;
    	$product->name = $request->name;
    	$product->price = $request->price;
    	$product->description = $request->description;

    	$request->user->product->save($product);

    	return redirect()->route('product', ['id' => $product->id]);
    }

    /**
     * Delete a product.
     *
     * @param Request
     * @param id
     * @return redirect
     */
    public function delete($id)
    {
    	return $this->product; 
    }
}
