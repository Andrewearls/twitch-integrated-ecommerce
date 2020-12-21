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

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'admin']);
        $role1->givePermissionTo('edit products');
        $role1->givePermissionTo('edit articles');
        $role1->givePermissionTo('edit social media');
        $role1->givePermissionTo('manage orders');

        $role2 = Role::create(['name' => 'customer']);
        // $role2->givePermissionTo('');

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
        $user->teams()->attach($team, ['permissions' => json_encode($role3)]);
    }
}
