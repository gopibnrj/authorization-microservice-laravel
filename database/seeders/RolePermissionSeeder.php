<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        $appId = 1;

        $adminRole = Role::create(['name' => 'Admin', 'app_id' => $appId]);
        $userRole = Role::create(['name' => 'User', 'app_id' => $appId]);

        $permissions = [
            'view_dashboard',
            'manage_users',
            'view_reports',
        ];

        foreach ($permissions as $perm) {
            $permission = Permission::create(['name' => $perm, 'app_id' => $appId]);
            $adminRole->permissions()->attach($permission);
            $userRole->permissions()->attach($permission);
        }
    }
}
