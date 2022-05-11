<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

use App\Models\Banner;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\NewsComment;

class NewsViewComponent extends Component
{
    public $menu_name = "News And Event";
    public $menu_icon = "fas fa-calendar";
    public $menu_slug = "news";
    public $menu_table = "news";

    public $news;
    public $name;
    public $email;
    public $phone;
    public $title;
    public $message;

    public function rules()
    {
        return [
            "name"      => "required|max:50",
            "phone"     => "nullable|max:15",
            "email"     => "required|email|max:50",
            "title"     => "nullable|max:100",
            "message"   => "required|max:1000",
        ];
    }

    public function submit()
    {
        $data = $this->validate();

        DB::statement(DB::raw("ALTER TABLE {$this->menu_table} AUTO_INCREMENT = 1"));

        $news_comment = NewsComment::create($data + ["news_id" => $this->news->id]);

        if (env("APP_ENV") == "production") {
            Mail::send("email.news-comment", [
                "news_comment" => $news_comment,
                "created_at" => now(),
            ], function ($message) {
                $message
                    ->to(env("CONTACT_EMAIL"))
                    ->cc(env("CONTACT_EMAIL"))
                    ->bcc(env("CONTACT_EMAIL"))
                    ->subject("News Comment - {$this->news->name} - " . date("H:i:s l, d F Y"));
            });
        }

        Session::flash("success", trans("message.Thank you for your comment."));

        $this->name = null;
        $this->phone = null;
        $this->email = null;
        $this->title = null;
        $this->message = null;
        $this->resetErrorBag();
    }

    public function mount($news_slug)
    {
        $this->banner = Banner::find(6);

        $this->news = News::where("slug", $news_slug)->onlyActive()->first();

        if (!$this->news) {
            Session::flash("danger", trans("page.{$this->menu_name}") . " " . trans("message.not found or has been deleted"));

            return redirect()->route("{$this->menu_slug}.index");
        }

        $this->data_news_comment = NewsComment::where("news_id", $this->news->id)
            ->onlyActive()
            ->orderBy("id")
            ->get();

        $this->data_other_news = News::where("id", "!=", $this->news->id)
            ->onlyActive()
            ->inRandomOrder()
            ->limit("3")
            ->get();

        $this->data_news_category = NewsCategory::onlyActive()->orderByDesc("id")->get();

        $this->data_recent_news = News::onlyActive()->orderByDesc("id")->limit(3)->get();

        $this->data_popular_tags = News::onlyActive()->orderByDesc("id")->first();
    }

    public function render()
    {
        $this->news->refresh();

        return view("livewire.{$this->menu_slug}.view")->extends("layouts.app", ["banner" => $this->banner])->section("content");
    }
}
