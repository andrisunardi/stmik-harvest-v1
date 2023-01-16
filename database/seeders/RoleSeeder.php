<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        Role::create(['name' => 'Super User']);
        Role::create(['name' => 'Board Of Directors']);
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'Finance']);
        Role::create(['name' => 'Sales']);
        Role::create(['name' => 'Development']);
        Role::create(['name' => 'Staff']);
        Role::create(['name' => 'Client']);
        Role::create(['name' => 'Agent']);
        Role::create(['name' => 'User']);
        Role::create(['name' => 'Creator Forum']);
        Role::create(['name' => 'Game Developer']);
        Role::create(['name' => 'Job Poster']);
        Role::create(['name' => 'Influencer']);
        Role::create(['name' => 'Game Creator']);
    }
}
