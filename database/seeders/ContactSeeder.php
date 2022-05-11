<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Contact;

class ContactSeeder extends Seeder
{
    public function run()
    {
        $data = new Contact();
        $data->name = "Andri Sunardi";
        $data->phone = "087871113361";
        $data->email = "info@andrisunarid.com";
        $data->company = "DIW.co.id";
        $data->message = "Test";
        $data->save();
    }
}
