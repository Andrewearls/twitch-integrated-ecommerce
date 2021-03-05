<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Team;
use App\Store;

class TeamTest extends TestCase
{

	use DatabaseTransactions;

    /**
     * Check if a team has been created.
     *
     * @return void
     */
    public function testExistance()
    {
    	$teams = Team::all();
        $this->assertCount(1, $teams);
    }

    /**
     * Check if the team has a store.
     *
     * @return void
     */
    public function testHasStore()
    {
    	$team = Team::first();
    	$this->assertTrue($team->store()->exists());
    }


}
