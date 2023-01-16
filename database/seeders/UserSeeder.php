<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $user = User::create([
            'name' => 'Super User',
            'username' => 'superuser',
            'email' => 'superuser@gmail.com',
            'phone' => '01234567890',
            'password' => Hash::make('12345678'),
            'image' => 'super-user.png',
            'is_active' => true,
        ]);

        $user->assignRole('Super User');
    }
}
