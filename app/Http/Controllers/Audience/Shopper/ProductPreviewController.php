<?php

namespace App\Http\Controllers\Audience\Shopper;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class ProductPreviewController extends Controller
{
    /**
     * Display product description.
     *
     * @param Request
     * @param int Product Id
     * @return view ProductDescription
     */
    public function index(Request $request, $id)
    {
    	$product = Product::find($id);

    	return view('audience.shopping.product.preview')->with(['product' => $product, 'images' => $product->images]);
    }
}
