<?php

namespace App\Cart;

use Illuminate\Http\Request;
use Cart;

/**
 * 
 */
class SessionAdapter
{

	function __construct()
	{
		$this->checkForSessionCart();
	}

	/**
	 * check if cart is stored in session.
	 *
	 * @param Request
	 * @return bool
	 */
	public function checkForSessionCart(Request $request)
	{
		# code...
	}

	/**
	 * Fill the cart from session data.
	 *
	 * @param collection
	 * @return this
	 */
	public function loadCart($cartItems)
	{
		try {
			// add the items to the current cart
			foreach ($cartItems as $key => $item) {				
				Cart::add(
					$item->id,
					$item->name,
					$item->price,
					$item->quantity,
					$item->options
				);
			}

			return true;
		} catch (Exception $e) {
			throw new Exception("Cart items did not load", 1);
		}
		// Cart::content()->each(function ($item, $key) {
		// 	dd($item->getUniqueId());
		// });

		// Cart::content()->each(function ($item, $key) {
		// 	dd($item->getUniqueId());
		// });

		return false;
	}
}