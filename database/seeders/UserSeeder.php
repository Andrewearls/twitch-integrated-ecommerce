<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create Super Admin user
        $superAdmin = User::factory()->create([
            'name' => env('SUPER_ADMIN_NAME'),
            'email' => env('SUPER_ADMIN_EMAIL'),
            'password' => Hash::make(env('SUPER_ADMIN_PASSWORD')),
        ]);
        // Assign Super Admin Role
        $superAdmin->assignRole('Super Admin');


        // Create a test admin
        $admin = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
        ]);
        // Assign Customer Role
        $admin->assignRole('admin');


         // Create a test customer
        $customer = User::factory()->create([
            'name' => 'Customer',
            'email' => 'customer@test.com',
        ]);
        // Assign Admin Role
        $customer->assignRole('customer');

    }
}
