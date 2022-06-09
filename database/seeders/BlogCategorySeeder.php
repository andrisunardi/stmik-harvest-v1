<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogCategorySeeder extends Seeder
{
    public function run()
    {
        $data = new BlogCategory();
        $data->name = "Blog Category";
        $data->name_id = "Kategori Blog";
        $data->description = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, dolor molestias? Debitis ullam odit voluptates, fuga sed ab eveniet ratione quam, consequuntur nostrum ducimus deleniti repellendus eum incidunt odio exercitationem?";
        $data->description_id = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, dolor molestias? Debitis ullam odit voluptates, fuga sed ab eveniet ratione quam, consequuntur nostrum ducimus deleniti repellendus eum incidunt odio exercitationem?";
        $data->slug = Str::slug($data->name);
        $data->save();
    }
}
