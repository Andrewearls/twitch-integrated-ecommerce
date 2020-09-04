<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
	/**
	 * return a list of items in the cart.
	 *
	 * @return view
	 */
	public function index(Request $request)
	{
		if ($request->session()->exists('cart')) {
			dd($request->session()->pull('cart'));
			// retrieve the cart
			Cart::add($request->session()->pull('cart'));
		}
		return Cart::content();
	}

	/**
	 * Add an item to the cart.
	 *
	 * @param Request
	 * @return redirect
	 */
	public function addItem(Request $request)
	{
		// if ($request->session()->exists('cart')) {
		// 	// retrieve the cart
		// 	$cart = $request->session()->get('cart');
		// 	foreach ($cart as $item => $value) {
		// 		dd($value->getUniqueId());
		// 	}
		// 	dd($cart);
		// }

		// dd($request->session->all());
		// $cartItem = Cart::add($id, $name, $price, $quantity);
		$cartItem = Cart::add(1, 'yellow box', 100, 1);
		$cartItem = Cart::add(2, 'yellow box', 100, 1);
		$cartItem = Cart::add(1, 'yellow box', 100, 1);

		Cart::content()->each(function ($item, $key) {
			dd($item->getUniqueId());
		});

		dd(Cart::content());

		$request->session()->push('cart', Cart::content());
		// dd($request->session()->get('cart')[0]);
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
		Cart::remove($cartItem->uniqueId);
		return redirect()->route('cart');
	}

}
