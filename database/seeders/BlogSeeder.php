<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 3; $i++) {
            $data = new Blog();
            $data->blog_category_id = 1;
            $data->title = "Welcome To Our Website {$i}";
            $data->title_idn = "Selamat Datang Di Website Kami {$i}";
            $data->short_body = "Welcome To Our Website {$i}";
            $data->short_body_idn = "Selamat Datang Di Website Kami {$i}";
            $data->body = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, dolor molestias? Debitis ullam odit voluptates, fuga sed ab eveniet ratione quam, consequuntur nostrum ducimus deleniti repellendus eum incidunt odio exercitationem?';
            $data->body_idn = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, dolor molestias? Debitis ullam odit voluptates, fuga sed ab eveniet ratione quam, consequuntur nostrum ducimus deleniti repellendus eum incidunt odio exercitationem?';
            $data->tag = 'blog, university, stmik harvest';
            $data->tag_idn = 'blog, universitas, stmik harvest';
            $data->date = now()->format('Y-m-d');
            $data->image = Str::slug($data->title).'.png';
            $data->slug = Str::slug($data->title);
            $data->save();
        }
    }
}
