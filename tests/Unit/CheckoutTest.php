<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\User;
use App\Address;
use App\AddressType;
use App\Product;
use App\Cart\CartInterface as Cart;

class CheckoutTest extends TestCase
{
	// protected variables
	protected $customer;
	protected $activeProduct;

	/**
	 * set up the test.
	 *
	 * @return void
	 */
	public function setUp(): void
	{
		parent::setUp();

		// Create new customer
		$this->customer = User::factory()->create()->assignRole('customer');

		// Assign billing address
		$this->customer->billingAddress = Address::factory()->create(['type' => AddressType::BILLING]);

		// create product
		$this->activeProduct = Product::factory()->create();

		// Add product to customer cart
		$cart = new Cart;
		$cart->add($this->activeProduct);
	}

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testAutofillAddress()
    {
    	// visit checkout page
		$this->visit(route('checkout'));
    	// verify autofill on page
        $this->see($this->customer->billingAddress->address);
    }
}
