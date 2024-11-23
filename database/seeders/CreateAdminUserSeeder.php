<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;


class CreateAdminUserSeeder extends Seeder
{
    /**
     * Create the initial roles and permissions.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'permission.index']);
        Permission::create(['name' => 'roles.index']);
        Permission::create(['name' => 'roles.create']);
        Permission::create(['name' => 'roles.edit']);
        Permission::create(['name' => 'roles.delete']);

        Permission::create(['name' => 'dashboard.index']);
        Permission::create(['name' => 'dashboard.create']);
        Permission::create(['name' => 'dashboard.edit']);
        Permission::create(['name' => 'dashboard.delete']);

        // create roles and assign existing permissions
       

        $role2 = Role::create(['name' => 'admin']);
        $role2->givePermissionTo('roles.index');

        $role3 = Role::create(['name' => 'Super-Admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
       

        $user = \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin890'),
        ]);
        $user->assignRole($role2);

        $user2 = \App\Models\User::factory()->create([
            'name' => 'Super-Admin',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('admin890'),
        ]);
        $user2->assignRole($role3);
    }
}