<?php

use Illuminate\Database\Seeder;

class AssignRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	foreach (range(1,4) as $role) {
	        DB::table('user_role')->insert([
		        'user_id' => 1,
		        'role_id' => $role,
		    ]);
    	}
        
	}
}
