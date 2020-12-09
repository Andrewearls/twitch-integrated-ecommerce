<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

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

        // create roles and assign existing permissions

        $role3 = Role::create(['name' => 'super-admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create Super Admin user
        $user = \App\Models\User::factory()->create([
                    'name' => 'Example Super-Admin User',
                    'email' => 'superadmin@example.com',
                ]);
        
        $user->assignRole($role3);
    }
}
