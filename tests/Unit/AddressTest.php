<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\User;
use App\Address;
use App\AddressType;

class AddressTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testAddresslessNewUser()
    {
    	$user = User::factory()->create([
    		'first_name' => 'Address',
    		'last_name' => 'tester',
    	]);

        $this->assertTrue($user->addresses->isEmpty());
    }

    /**
     * Test persist billing address.
     *
     * @return void
     */
    public function testPersistBillingAddress()
    {
    	$user = User::where('first_name', 'Address')->first();

    	$user->billingAddress = Address::factory()->create([
    		'type' => AddressType::BILLING,
    	]);

    	$this->assertEquals($user->billingAddress->type, AddressType::BILLING);
    }

    /**
     * Test persist Shipping Address.
     *
     * @return void
     */
    public function testPersistShippingAddress()
    {
    	$user = User::where('first_name', 'Address')->first();

    	$user->shippingAddress = Address::factory()->create([
    		'type' => AddressType::SHIPPING,
    	]);

    	$this->assertEquals($user->shippingAddress->type, AddressType::SHIPPING);
    }
}
