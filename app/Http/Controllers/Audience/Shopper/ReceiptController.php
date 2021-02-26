<?php

namespace App\Http\Controllers\Audience\Shopper;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Melihovv\ShoppingCart\Facades\ShoppingCart as Cart;
use App\Cart\CartInterface as Cart;

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
        $user = $request->user();
        $receipt = $request->user()->receipts()->find($receiptId);
        // dd($receipt);
        // $cart = Cart::instance($receipt->id)->restore($request->user()->id);
        $cart = new Cart();
        $cart->instance($user, $receipt->id);
        // dd($cart->content());

    	return view('audience.shopping.receipt')->with(['receipt' => $receipt, 'cart' => $cart, 'user' => $user,]);
    }
}
