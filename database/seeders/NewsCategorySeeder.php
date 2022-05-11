<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use App\Models\NewsCategory;

class NewsCategorySeeder extends Seeder
{
    public function run()
    {
        $data = new NewsCategory();
        $data->name = "News Category";
        $data->name_id = "Kategori Berita";
        $data->description = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, dolor molestias? Debitis ullam odit voluptates, fuga sed ab eveniet ratione quam, consequuntur nostrum ducimus deleniti repellendus eum incidunt odio exercitationem?";
        $data->description_id = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, dolor molestias? Debitis ullam odit voluptates, fuga sed ab eveniet ratione quam, consequuntur nostrum ducimus deleniti repellendus eum incidunt odio exercitationem?";
        $data->slug = Str::slug($data->name);
        $data->save();
    }
}
