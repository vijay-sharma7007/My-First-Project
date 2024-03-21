<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        Permission::create(['name' => 'Update Control']);
        Permission::create(['name' => 'Delete Control']);
        Permission::create(['name' => 'View Control']);
        Permission::create(['name' => 'button control']);
        Permission::create(['name' => 'Alert Control']);
        Permission::create(['name' => 'Card Control']);
        Permission::create(['name' => 'Delete Post Control']);
        Permission::create(['name' => 'Role Control']);
        Permission::create(['name' => 'permissions Control']);
        Permission::create(['name' => 'Login Control']);
        Permission::create(['name' => 'User Control']);
        Permission::create(['name' => 'Icon Control']);
        Permission::create(['name' => 'Sample Page']);
        Permission::create(['name' => 'Create Role']);
        Permission::create(['name' => 'Create Permission']);
        Permission::create(['name' => 'Create User']);
        Permission::create(['name' => 'give-Permissions']);
        }
    
}
