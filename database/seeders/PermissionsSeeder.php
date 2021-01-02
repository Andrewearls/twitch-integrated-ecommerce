<?php

namespace Database\Seeders;

use App\User;
use App\Team;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Support\Facades\Hash;

class PermissionsSeeder extends Seeder
{
    /**
     * create the initial roles and permissions. 
     * https://spatie.be/docs/laravel-permission/v3/basic-usage/basic-usage
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'edit resources']);
        Permission::create(['name' => 'edit products']);
        Permission::create(['name' => 'edit articles']);
        Permission::create(['name' => 'edit social media']);
        Permission::create(['name' => 'manage orders']);
        Permission::create(['name' => 'manage my orders']);
        Permission::create(['name' => 'view dashboard']);
        Permission::create(['name' => 'manage stripe account']);
        Permission::create(['name' => 'checkout']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'admin']);
        $role1->givePermissionTo('edit products');
        $role1->givePermissionTo('edit articles');
        $role1->givePermissionTo('edit social media');
        $role1->givePermissionTo('manage orders');
        $role1->givePermissionTo('view dashboard');

        $role2 = Role::create(['name' => 'customer']);
        $role2->givePermissionTo('manage my orders');
        $role2->givePermissionTo('checkout');

        $role3 = Role::create(['name' => 'Super Admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create Super Admin user
        $user = User::factory()->create([
            'name' => env('SUPER_ADMIN_NAME'),
            'email' => env('SUPER_ADMIN_EMAIL'),
            'password' => Hash::make(env('SUPER_ADMIN_PASSWORD')),
        ]);

        // Create the team for the Super Admin
        $team = Team::create([
			'name' => $user->name . ' Team',
			'owner_id' => $user->id,
		]);

        $user->assignRole($role3);
        $user->teams()->attach($team, ['permissions' => $role3->id]);

        // Create a test customer
        $user = User::factory()->create([
            'name' => 'Customer',
            'email' => 'customer@test.com',
        ]);

        $user->assignRole($role2);
        $user->teams()->attach($team, ['permissions' => $role2->id]);

        // Create a test admin
        $user = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
        ]);

        $user->assignRole($role1);
        $user->teams()->attach($team, ['permissions' => $role1->id]);
    }
}
