<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductFormValidator as Validator;
use App\Product;
use App\Image;

class ProductController extends Controller
{
    /**
     * display product details.
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
     * Return view for editing a product.
     *
     * @param id
     * @return view
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('layouts.product.edit', [
            'product' => $product,
        ]);
    }

    /**
     * Update a product.
     *
     * @param Request
     * @param id
     * @return redirect
     */
    public function update(Validator $request, $id = null)
    {
        $user = auth()->user();

        // Save the image
        $image = new Image();  
        $image->image = file_get_contents($request->file('image'));      
        $image->save();
        $image->refresh();
        // $image = $user->currentTeam->images()->save($image);
        // $images = json_encode(array($image->id));

        // make the product
    	$product = new Product();
        $store = $user->currentTeam->store;

    	if (!empty($id)) {
    		$product = Product::find($id);    		
    	}

    	$product->name = $request->name;
    	$product->price = toCents($request->price);
    	$product->description = $request->description;

    	$store->products()->save($product);

        // Attach image to product
        $product->refresh();
        $product->images()->attach($image->id);

    	return redirect()->route('inventory');
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
        $product = Product::find($id);
        $product->delete();
    	return redirect()->route('inventory'); 
    }
}
