<?php

namespace App\Http\Controllers\Admin\Search;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Return List of all Products by User.
     *
     * @param Request
     * @return view
     */
    public function index(Request $request)
    {
    	return $request->user()->products;
    }
}
