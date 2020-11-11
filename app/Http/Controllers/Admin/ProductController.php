<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductFormValidator as Validator;
use App\Product;

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
    	$product = new Product();
        $store = $request->user()->currentTeam->store;

    	if (!empty($id)) {
    		$product = Product::find($id);
    		
    	}

    	// $product->user_id = $request->user->id;
    	// $product->user_id = 1;
        // dd($request->user()->currentTeam->id);
        // dd($product);
        // $product->store_id = $store->id;
    	$product->name = $request->name;
    	$product->price = toCents($request->price);
    	$product->description = $request->description;

        // if ($product->isDirty('price')) {
        //     dd('price is dirty');
        // }

    	$store->products()->save($product);

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
