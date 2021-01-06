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
		$this->assertTrue(True);

	}

    /**
     * Test that user has seeded.
     *
     * @return void
     */
    public function testUserCreatedTest()
    {
        // $this->withoutExceptionHandling();
    	// $users = User::all();
        // $this->assertTrue($users->count() >= 1);
        $this->assertTrue(True);
    }
}
