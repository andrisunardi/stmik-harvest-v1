<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use App\Models\Testimony;

class TestimonySeeder extends Seeder
{
    public function run()
    {
        $data = new Testimony();
        $data->name = "Riki Ari Andri Yani";
        $data->description = "Great to be here, nice environment, nice lecturers and great to hear about future technopreneur college as our DNA";
        $data->graduate = "Alumni SMK Wikrama Bogor";
        $data->image = Str::slug($data->name) . ".webp";
        $data->save();

        $data = new Testimony();
        $data->name = "Fernando";
        $data->description = "What a great chance for me to be here, meet with great lecturers, great friends and green environment";
        $data->graduate = "Alumni SMK Immanuel Pontianak";
        $data->image = Str::slug($data->name) . ".webp";
        $data->save();

        $data = new Testimony();
        $data->name = "Riki Ari Andri Yani 1";
        $data->description = "Great to be here, nice environment, nice lecturers and great to hear about future technopreneur college as our DNA";
        $data->graduate = "Alumni SMK Wikrama Bogor";
        $data->image = Str::slug($data->name) . ".webp";
        $data->save();

        $data = new Testimony();
        $data->name = "Fernando 1";
        $data->description = "What a great chance for me to be here, meet with great lecturers, great friends and green environment";
        $data->graduate = "Alumni SMK Immanuel Pontianak 1";
        $data->image = Str::slug($data->name) . ".webp";
        $data->save();

        $data = new Testimony();
        $data->name = "Riki Ari Andri Yani 2";
        $data->description = "Great to be here, nice environment, nice lecturers and great to hear about future technopreneur college as our DNA";
        $data->graduate = "Alumni SMK Wikrama Bogor";
        $data->image = Str::slug($data->name) . ".webp";
        $data->save();

        $data = new Testimony();
        $data->name = "Fernando 2";
        $data->description = "What a great chance for me to be here, meet with great lecturers, great friends and green environment";
        $data->graduate = "Alumni SMK Immanuel Pontianak 2";
        $data->image = Str::slug($data->name) . ".webp";
        $data->save();
    }
}
