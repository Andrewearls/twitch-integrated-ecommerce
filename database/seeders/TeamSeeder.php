<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Team;
use App\User;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::first();
        $team = Team::create::([
        	'name' = $user->name . ' Team',
        	'owner_id' = $user->id,
        ]);
    }
}
