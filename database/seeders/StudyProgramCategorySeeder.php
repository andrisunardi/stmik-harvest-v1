<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use App\Models\StudyProgramCategory;

class StudyProgramCategorySeeder extends Seeder
{
    public function run()
    {
        $data = new StudyProgramCategory();
        $data->code = "S1";
        $data->name = "Undergraduate Program";
        $data->name_id = "Program Sarjana";
        $data->description = "Description Undergraduate Program";
        $data->description_id = "Deskripsi Program Sarjana";
        $data->image = Str::slug($data->name) . ".png";
        $data->slug = Str::slug($data->name);
        $data->save();

        $data = new StudyProgramCategory();
        $data->code = "S2";
        $data->name = "Postgraduate Program";
        $data->name_id = "Program Pascasarjana";
        $data->description = "Description Postgraduate Program";
        $data->description_id = "Deskripsi Program Pascasarjana";
        $data->image = Str::slug($data->name) . ".png";
        $data->slug = Str::slug($data->name);
        $data->save();

        $data = new StudyProgramCategory();
        $data->code = "S3";
        $data->name = "Doctoral Program";
        $data->name_id = "Program Doktoral";
        $data->description = "Description Doctoral Program";
        $data->description_id = "Deskripsi Program Doktoral";
        $data->image = Str::slug($data->name) . ".png";
        $data->slug = Str::slug($data->name);
        $data->save();
    }
}
