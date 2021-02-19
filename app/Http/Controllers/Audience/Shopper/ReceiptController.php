<?php

namespace App\Http\Controllers\Audience\Shopper;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Melihovv\ShoppingCart\Facades\ShoppingCart as Cart;

class ReceiptController extends Controller
{
    /**
     * return the receipt.
     *
     * @param Request
     * @param Optional ReceiptId
     * @return view
     */
    public function index(Request $request, $receiptId)
    {
        $receipt = $request->user()->receipts()->find($receiptId);

        $cart = Cart::instance($receipt->id)->restore($request->user()->id);

    	return view('audience.shopping.receipt')->with(['receipt' => $receipt, 'cart' => $cart]);
    }
}
