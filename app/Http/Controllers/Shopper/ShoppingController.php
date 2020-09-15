<?php

namespace App\Http\Controllers\Shopper;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class ShoppingController extends Controller
{
    /**
     * Return a list of items availible from this store.
     *
     * @return view
     */
    public function index()
    {

    	return Product::all();
    }
}
