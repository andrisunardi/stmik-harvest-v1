<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Component;
use App\Models\Lecturer;
use App\Models\News;
use App\Models\Newsletter;
use App\Models\Offer;
use App\Models\Slider;
use App\Models\StudyProgram;
use App\Models\Testimony;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class HomeComponent extends Component
{
    public $menu_name = "Home";
    public $menu_icon = "fas fa-home";
    public $menu_slug = "home";
    public $menu_table = "home";

    public $email;

    public function rules()
    {
        return [
            "email" => "required|email|max:50|unique:newsletter,email",
        ];
    }

    public function submit()
    {
        $data = $this->validate();

        if (env("APP_ENV") != "testing") {
            DB::statement(DB::raw("ALTER TABLE newsletter AUTO_INCREMENT = 1"));
        }

        $newsletter = Newsletter::create($data);

        if (env("APP_ENV") == "production") {
            Mail::send("email.newsletter", [
                "newsletter" => $newsletter,
                "created_at" => now(),
            ], function ($message) {
                $message
                    ->to(env("CONTACT_EMAIL"))
                    ->cc(env("CONTACT_EMAIL"))
                    ->bcc(env("CONTACT_EMAIL"))
                    ->subject("Newsletter - " . date("d F Y"));
            });
        }

        Session::flash("success", trans("message.Thank you for subscribe our newsletter"));
    }

    public function mount()
    {
        $this->data_slider = Slider::onlyActive()->orderByDesc("id")->limit(3)->get();

        $this->data_offer = Offer::onlyActive()->orderBy("id")->get();

        $this->data_testimony = Testimony::onlyActive()->orderByDesc("id")->get();

        $this->data_lecturer = Lecturer::onlyActive()->orderBy("id")->get();

        $this->data_study_program = StudyProgram::onlyActive()->orderBy("id")->get();

        $this->data_news = News::onlyActive()->limit(4)->orderByDesc("id")->get();
    }

    public function render()
    {
        return view("livewire.{$this->menu_slug}.index")->extends("layouts.app")->section("content");
    }
}
