<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Models\Admin;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $data = new Admin();
        $data->access_id = "1";
        $data->name = "System";
        $data->email = Str::slug($data->name, "") . "@gmail.com";
        $data->username = Str::slug($data->name, "");
        $data->password = Hash::make("12345");
        $data->image = Str::slug($data->name) . ".png";
        $data->save();
        $data->id = 0;
        $data->save();

        if (env("APP_ENV") != "testing") {
            DB::statement(DB::raw("ALTER TABLE admin AUTO_INCREMENT = 1"));
        }

        $data = new Admin();
        $data->access_id = "1";
        $data->name = "Super Admin";
        $data->email = Str::slug($data->name, "") . "@gmail.com";
        $data->username = Str::slug($data->name, "");
        $data->password = Hash::make("12345");
        $data->image = Str::slug($data->name) . ".png";
        $data->save();
        $data->assignRole("Super Admin");

        $data = new Admin();
        $data->access_id = "2";
        $data->name = "Admin";
        $data->email = Str::slug($data->name, "") . "@gmail.com";
        $data->username = Str::slug($data->name, "");
        $data->password = Hash::make("12345");
        $data->image = Str::slug($data->name) . ".png";
        $data->save();
        $data->assignRole("Admin");

        $data = new Admin();
        $data->access_id = "2";
        $data->name = "Rosita Togatorop";
        $data->email = Str::slug($data->name, "") . "@gmail.com";
        $data->username = Str::slug($data->name, "");
        $data->password = Hash::make("12345");
        $data->image = Str::slug($data->name) . ".png";
        $data->save();
        $data->assignRole("Admin");

        $data = new Admin();
        $data->access_id = "2";
        $data->name = "Shesy Hirawistya Satir";
        $data->email = Str::slug($data->name, "") . "@gmail.com";
        $data->username = Str::slug($data->name, "");
        $data->password = Hash::make("12345");
        $data->image = Str::slug($data->name) . ".png";
        $data->save();
        $data->assignRole("Admin");
    }
}
