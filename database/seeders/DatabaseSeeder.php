<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        Role::create([
            'name' => 'super-admin'
        ]);
        $user = User::create([
            'name' => 'super-user',
            'email' => 'user@user.com',
            'password' => Hash::make('password'),
        ]);

        $user->syncRoles(['role_id' => 1]);
        $this->call([
            PermissionSeeder::class
        ]);
    }
}
