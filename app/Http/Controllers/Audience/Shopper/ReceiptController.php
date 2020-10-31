<?php

namespace App\Http\Controllers\Audience\Shopper;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReceiptController extends Controller
{
    /**
     * return the receipt.
     *
     * @param Request
     * @param Optional ReceiptId
     * @return view
     */
    public function index(Request $request, $receiptId = null)
    {
    	return view('audience.shopping.receipt');
    }
}
