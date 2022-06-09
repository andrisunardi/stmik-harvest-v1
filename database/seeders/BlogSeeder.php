<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    public function run()
    {
        for ($i=1; $i <= 3; $i++) {
            $data = new Blog();
            $data->blog_category_id = 1;
            $data->name = "Welcome To Our Website {$i}";
            $data->name_id = "Selamat Datang Di Website Kami {$i}";
            $data->description = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, dolor molestias? Debitis ullam odit voluptates, fuga sed ab eveniet ratione quam, consequuntur nostrum ducimus deleniti repellendus eum incidunt odio exercitationem?";
            $data->description_id = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, dolor molestias? Debitis ullam odit voluptates, fuga sed ab eveniet ratione quam, consequuntur nostrum ducimus deleniti repellendus eum incidunt odio exercitationem?";
            $data->tag = "blog, university, stmik harvest";
            $data->tag_id = "blog, universitas, stmik harvest";
            $data->date = now()->format("Y-m-d");
            $data->image = Str::slug($data->name) . ".png";
            $data->slug = Str::slug($data->name);
            $data->save();
        }
    }
}
