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
        $superAdmin = User::role('Super Admin')->first();
        // Create the team for the Super Admin
        $team = Team::create([
            'name' => $superAdmin->name . ' Team',
            'owner_id' => $superAdmin->id,
        ]);

        $users = User::all();
        foreach ($users as $user) {
            $user->attachTeam($team);
        }
    }
}
