<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Setting;

class SettingSeeder extends Seeder
{
    public function run()
    {
        $data = new Setting();
        $data->sms = "(021) 5890 5007";
        $data->call = "(021) 5890 5007";
        $data->fax = "(021) 5890 5007";
        $data->whatsapp = "";
        $data->email = "contact@ptmdvindonesia.com";
        $data->address = "Jl. Batu Mulia, Rukan Taman Meruya Blok M 95-97, Jakarta Barat, 11620";
        $data->google_maps = "https://goo.gl/maps/PoFdy5PLbE2Voa6e9";
        $data->google_maps_iframe = "https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15866.147765443879!2d106.7390874!3d-6.1926542!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x6b18e0ca86431724!2sPT%20MDV%20Indonesia!5e0!3m2!1sid!2sid!4v1631602696978!5m2!1sid!2sid";
        $data->save();
    }
}
