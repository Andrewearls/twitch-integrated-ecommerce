<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$roles = ['superAdmin', 'admin', 'author', 'guest'];
    	foreach ($roles as $role) {
    		DB::table('role')->insert([
	            'title' => $role,
	        ]);
    	}
        
    }
}
