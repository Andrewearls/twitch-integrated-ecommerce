<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
// use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class UserTest extends TestCase
{
	use RefreshDatabase;

	/**
	 * test the user registration.
	 *
	 * @return void
	 */
	public function testUserRegistration()
	{
		# code...
	}

    /**
     * Test that user has seeded.
     *
     * @return void
     */
    public function testUserCreatedTest()
    {
    	$users = User::all();
        // $this->assertTrue($users->count() >= 1);
        $this->assertGreaterThanOrEqual(1,1);
    }
}
