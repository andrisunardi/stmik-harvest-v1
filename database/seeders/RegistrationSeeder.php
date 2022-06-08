<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Registration;

class RegistrationSeeder extends Seeder
{
    public function run()
    {
        $data = new Registration();
        $data->name = "Andri Sunardi";
        $data->email = "info@andrisunardi.com";
        $data->phone = "087871113361";
        $data->gender = 1;
        $data->school = "SMK Bonavita";
        $data->major = "Multimedia";
        $data->city = "Tangerang";
        $data->type = 1;
        $data->save();
    }
}
