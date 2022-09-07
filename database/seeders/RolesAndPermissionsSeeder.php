<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'access-admin-dashboard']);
        Permission::create(['name' => 'edit-users']);

        $adminRole = Role::create(['name' => 'Admin'])
                ->givePermissionTo(['access-admin-dashboard', 'edit-users']);
                
        $userRole = Role::create(['name' => 'Customer']);

    }
}
