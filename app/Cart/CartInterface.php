<?php

namespace App\Cart;

use Illuminate\Http\Request;
use Melihovv\ShoppingCart\Facades\ShoppingCart;

/**
 * Interface with the shopping cart pacage
 */
class CartInterface
{
	
	function __construct(Request $request)
	{
		$this->checkForSessionCart($request);
	}

	/**
	 * check if cart is stored in session.
	 *
	 * @param Request
	 * @return bool
	 */
	public function checkForSessionCart($request)
	{
		if ($request->session()->has('cart')) {
			$this->loadCart($request->session()->pull('cart'));
			return true;
		}
		return false;
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
				$this->add($item);
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

	/**
	 * display the content of the cart.
	 *
	 * @return collection
	 */
	public function content()
	{
		return ShoppingCart::content();
	}

	/**
	 * add items to the cart.
	 *
	 * @param id
	 * @param name
	 * @param price
	 * @param quantity
	 * @param options
	 * @return cartItem
	 */
	public function add(Product $item)
	{
		return ShippingCart::add(
					$item->id,
					$item->name,
					$item->price,
					$item->quantity,
					$item->options
				);
	}
}