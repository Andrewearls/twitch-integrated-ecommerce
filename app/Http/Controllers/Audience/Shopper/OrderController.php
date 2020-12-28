<?php

namespace App\Http\Controllers\Audience\Shopper;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Return a list of users orders.
     *
     * @param Request
     * @return App\Receipt
     */
    public function index(Request $request)
    {
    	$orders = auth()->user()->receipts;
    	return view('audience.shopping.orders')->with(['orders' => $orders]);
    }
}
