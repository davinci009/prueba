<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            ['name' => 'admin', 'guard_name' => 'web'],
            ['name' => 'publicador', 'guard_name' => 'web'],
            ['name' => 'visitante', 'guard_name' => 'web']
        ];

        Role::insert($roles);

        $admin = User::where('name', 'admin')->first();
        $admin->assignRole('admin');
    }
}
