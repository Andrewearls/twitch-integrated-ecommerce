<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Receipt;

class OrderController extends Controller
{
    /**
     * Return all orders.
     *
     * @return view
     */
    public function index()
    {
    	$orders = Receipt::all();
    	return view('admin.layouts.pages.store.orders')->with(['orders' => $orders]);
    }
}
