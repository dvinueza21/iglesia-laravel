<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        app(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();

        $view  = Permission::firstOrCreate(['name' => 'documents.view']);
        $manage= Permission::firstOrCreate(['name' => 'documents.manage']);

        $admin = Role::firstOrCreate(['name' => 'admin']);
        $admin->givePermissionTo([$view, $manage]);

        $user = Role::firstOrCreate(['name' => 'user']);
        $user->givePermissionTo([$view]);
    }
}
