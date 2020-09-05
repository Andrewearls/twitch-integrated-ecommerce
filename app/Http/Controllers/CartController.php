<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart\CartInterface as Cart;

class CartController extends Controller
{	
	/**
	 * return a list of items in the cart.
	 *
	 * @return view
	 */
	public function index(Cart $cart)
	{
		return $cart->content();
	}

	/**
	 * Add an item to the cart.
	 *
	 * @param Request
	 * @return redirect
	 */
	public function addItem(Request $request, Cart $cart)
	{

		// $cartItem = Cart::add($id, $name, $price, $quantity);
		new CartItem();
		$cartItem = $cart->add(2, 'yellow box', 100, 1);

		$request->session()->push('cart', $cart->content());

		return redirect()->route('cart');
	}

	/**
	 * Remove an item from the cart.
	 *
	 * @param Request
	 * @return redirect
	 */
	public function removeItem(Request $request)
	{
		$cart->remove($cartItem->uniqueId);
		return redirect()->route('cart');
	}

}
