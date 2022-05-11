<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\FaqCategory;

class FaqCategorySeeder extends Seeder
{
    public function run()
    {
        $data = new FaqCategory();
        $data->name = "Registration";
        $data->name_id = "Pendaftaran";
        $data->description = "Description Registration";
        $data->description_id = "Deskripsi Pendaftaran";
        $data->save();

        $data = new FaqCategory();
        $data->name = "Study Program";
        $data->name_id = "Program Studi";
        $data->description = "Description Study Program";
        $data->description_id = "Deskripsi Program Studi";
        $data->save();

        $data = new FaqCategory();
        $data->name = "About HITS";
        $data->name_id = "Tentang HITS";
        $data->description = "Description About HITS";
        $data->description_id = "Deskripsi Mata Tentang HITS";
        $data->save();

        $data = new FaqCategory();
        $data->name = "Career";
        $data->name_id = "Karir";
        $data->description = "Description Career";
        $data->description_id = "Deskripsi Karir";
        $data->save();
    }
}
