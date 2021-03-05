<?php

namespace App\Cart;

use Melihovv\ShoppingCart\Facades\ShoppingCart;
use App\Product;
use App\User;

/**
 * Interface with the shopping cart pacage
 */
class CartInterface
{
	
	function __construct()
	{
		if ($this->checkForSessionCart()) {
			$this->loadCart(session('cart'));
		}
	}

	/**
	 * Check if cart is stored in session.
	 *
	 * @param Request
	 * @return bool
	 */
	public function checkForSessionCart()
	{
		if (session()->has('cart')) {
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
				$product = Product::find($item->id);			
				$this->add($product, $item->quantity);
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
	 * Get or set the instance of the cart.
	 *
	 * @param instance name || null
	 * @return instance name
	 */
	public function instance(User $user, $name = null)
	{
		if ($name !== null) {
			ShoppingCart::instance($name)->restore($user->id);
		}

		return ShoppingCart::currentInstance();
	}

	/**
	 * The cart has been checked out time to process.
	 *
	 * @param user
	 * @return name of the instance
	 */
	public function process(User $user, $receiptId)
	{
		// Store the cart in a receipt category
		$this->store($user, $receiptId);

		// Switch instance
		ShoppingCart::instance('default')->restore($user->id);

		// Clear current instance
		ShoppingCart::clear();
		// $this->store($user, 'default');

		$this->save();

		return true;
	}

	/**
	 * Persist current shopping cart instance to storage.
	 *
	 * @param name of the instance
	 * @return name of the instance
	 */
	private function store(User $user, $name = null)
	{
		if ($name === null) {
			$name = $this->instance();
		}

		ShoppingCart::instance($name)->store($user->id);

		return $this;
	}

	/**
	 * Display the content of the cart.
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
	 * @param product
	 * @return cartItem
	 */
	public function add(Product $item, $quantity = 1)
	{
		// dd($item->price);
		return ShoppingCart::add(
					$item->id,
					$item->name,
					$item->price,
					$quantity,
					$item->options
				);
	}

	/**
	 * remove items from the cart.
	 *
	 * @param product
	 * @return cartItem
	 */
	public function remove(Product $item, $quantity = 1)
	{
		$cartItem = $this->search($item);
		// dd($cartItem->getUniqueId());
		return ShoppingCart::remove($cartItem->getUniqueId());
	}

	/**
	 * Search the shopping cart for an item.
	 *		
	 * @param Product
	 * @return uniqueId || null
	 */
	public function search(Product $item)
	{
		foreach ($this->content() as $cartItem) {
			if ($cartItem->id === $item->id) {
				return $cartItem;
			}
		}
		return null;
	}

	/**
	 * save the cart.
	 *
	 * @return bool
	 */
	public function save()
	{
		return session(['cart'=>$this->content()]);
	}

	/**
	 * return total.
	 *
	 * @return float $total
	 */
	public function total()
	{
		return toDollars(ShoppingCart::getTotal());
	}

	/**
	 * return a checkout ready version of the cart.
	 *
	 * @return object/checkout/ready/cart
	 */
	public function checkout()
	{
		$cart = collect();

		//this should be moved to $this->contents()
		$cart->products = [];

		foreach ($this->content() as $item) {
		    $product = Product::find($item->id);
		    $product->quantity = $item->quantity;
		    $cart->products[] = $product;
		}
		//this should be moved to $this->contents()

		$cart->total = $this->total();
		// dd($cart->products);

		return $cart;
	}
}