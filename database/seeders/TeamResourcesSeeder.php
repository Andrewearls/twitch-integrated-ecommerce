<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Team;

class TeamResourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $team = Team::first();

        $team->store()->create([
        	'stripe_user_id' => "acct_1I5Ea3CyTrSJOuR7", // testing id
		]);
    }
}
