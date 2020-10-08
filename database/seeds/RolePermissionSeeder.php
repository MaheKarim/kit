<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create Roles
        $roleSuperAdmin = Role::create(['name' => 'superadmin']);
        $roleAdmin = Role::create(['name' => 'backend']);
        $roleEditor = Role::create(['name' => 'editor']);
        $roleUser = Role::create(['name' => 'user']);

        // Permission List as Array

       $permissions = [

           // Dashboard
           'dashboard.view',

           // Blog Permissions
           'blog.create',
           'blog.view',
           'blog.edit',
           'blog.delete',
           'blog.approve',

           // Admin Permissions
           'backend.create',
           'backend.view',
           'backend.edit',
           'backend.delete',
           'backend.approve',

           // Role Permissions
           'role.create',
           'role.view',
           'role.edit',
           'role.delete',
           'role.approve',

           // Profile Permissions
           'profile.view',
           'profile.edit',

       ];

        // Create &  Assign Permissions

        for ($i = 0; $i < count($permissions); $i++){
          $permission = Permission::create(['name' => $permissions[$i]]);
            $roleSuperAdmin->givePermissionTo($permission);
            $permission->assignRole($roleSuperAdmin);
        }
    }
}
