<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\NewsComment;
use App\Models\News;

class NewsCommentSeeder extends Seeder
{
    public function run()
    {
        $data_news = News::all();

        foreach ($data_news as $news) {
            $data = new NewsComment();
            $data->news_id = $news->id;
            $data->name = "Name";
            $data->phone = "Phone";
            $data->email = "Email";
            $data->title = "Title";
            $data->message = "Message";
            $data->save();
        }
    }
}
