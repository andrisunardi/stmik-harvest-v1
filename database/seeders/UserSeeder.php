<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $data = new User();
        $data->name = 'Super User';
        $data->email = Str::slug($data->name, '').'@gmail.com';
        $data->username = Str::slug($data->name, '');
        $data->password = Hash::make('12345');
        $data->image = Str::slug($data->name).'.png';
        $data->save();

        $data = new User();
        $data->name = 'User';
        $data->email = Str::slug($data->name, '').'@gmail.com';
        $data->username = Str::slug($data->name, '');
        $data->password = Hash::make('12345');
        $data->image = Str::slug($data->name).'.png';
        $data->save();
    }
}
