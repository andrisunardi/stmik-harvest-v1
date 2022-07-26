<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        Role::create([
            'name' => 'Super User',
            'guard_name' => 'user',
        ]);

        Role::create([
            'name' => 'User',
            'guard_name' => 'user',
        ]);

        Role::create([
            'name' => 'Super Admin',
            'guard_name' => 'admin',
        ]);

        Role::create([
            'name' => 'Admin',
            'guard_name' => 'admin',
        ]);
    }
}
