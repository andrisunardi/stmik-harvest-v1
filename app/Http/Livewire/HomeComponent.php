<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Component;
use App\Models\AdmissionCalendar;
use App\Models\Blog;
use App\Models\Event;
use App\Models\Newsletter;
use App\Models\Offer;
use App\Models\Registration;
use App\Models\Slider;
use App\Models\Testimony;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class HomeComponent extends Component
{
    public $menu_name = "Home";
    public $menu_icon = "fas fa-home";
    public $menu_slug = "home";
    public $menu_table = "home";

    public $name;
    public $email;
    public $emailNewsletter;
    public $phone;
    public $gender;
    public $school;
    public $major;
    public $city;
    public $type;
    public $agree;

    public function resetInputFields()
    {
        $this->emailNewsletter = "";

        $this->name = "";
        $this->email = "";
        $this->phone = "";
        $this->gender = "";
        $this->school = "";
        $this->major = "";
        $this->city = "";
        $this->type = "";
        $this->agree = "";
    }

    public function submit()
    {
        $data = $this->validate([
            "name"      => "required|max:50|unique:registration,name",
            "email"     => "required|max:50|email|unique:registration,email",
            "phone"     => "required|max:15|unique:registration,phone",
            "gender"    => "required|numeric|" . Rule::in([1, 2]),
            "school"    => "required|max:50",
            "major"     => "required|max:50",
            "city"      => "required|max:50",
            "type"      => "required|numeric|" . Rule::in([1, 2]),
        ]);

        if (env("APP_ENV") != "testing") {
            DB::statement(DB::raw("ALTER TABLE registration AUTO_INCREMENT = 1"));
        }

        $registration = Registration::create($data);

        if (env("APP_ENV") == "production") {
            Mail::send("email.registration", [
                "registration" => $registration,
                "created_at" => now(),
            ], function ($message) {
                $message
                    ->to(env("CONTACT_EMAIL"))
                    ->cc(env("CONTACT_EMAIL"))
                    ->bcc(env("CONTACT_EMAIL"))
                    ->subject("Online Registration Form - " . date("d F Y"));
            });
        }

        $this->resetInputFields();
        $this->resetErrorBag();

        Session::flash("success", trans("message.Thank you for online registration"));
    }

    public function newsletter()
    {
        $this->validate(["emailNewsletter" => "required|email|max:50|unique:newsletter,email"]);

        if (env("APP_ENV") != "testing") {
            DB::statement(DB::raw("ALTER TABLE newsletter AUTO_INCREMENT = 1"));
        }

        $newsletter = Newsletter::create(["email" => $this->emailNewsletter]);

        if (env("APP_ENV") == "production") {
            Mail::send("email.newsletter", [
                "newsletter" => $newsletter,
                "created_at" => now(),
            ], function ($message) {
                $message
                    ->to(env("CONTACT_EMAIL"))
                    ->cc(env("CONTACT_EMAIL"))
                    ->bcc(env("CONTACT_EMAIL"))
                    ->subject("Newsletter Form - " . date("d F Y"));
            });
        }

        Session::flash("success", trans("message.Thank you for subscribe our newsletter"));
    }

    public function mount()
    {
        $this->data_slider = Slider::onlyActive()->orderByDesc("id")->limit(3)->get();

        $this->data_offer = Offer::onlyActive()->orderByDesc("id")->limit(4)->get();

        $this->admission_calendar = AdmissionCalendar::onlyActive()->orderByDesc("id")->first();

        $this->data_testimony = Testimony::onlyActive()->orderByDesc("id")->limit(10)->get();

        $this->data_blog = Blog::onlyActive()->limit(3)->orderByDesc("id")->get();

        $this->data_event = Event::where("end", "<=", now()->format("Y-m-d"))->onlyActive()->limit(6)->orderByDesc("start")->get();
        if ($this->data_event) {
            $this->data_event = Event::onlyActive()->limit(6)->orderByDesc("start")->get();
        }

        $this->data_upcoming_event = Event::where("start", ">=", now()->format("Y-m-d"))->onlyActive()->limit(2)->orderByDesc("start")->get();
        if ($this->data_upcoming_event) {
            $this->data_upcoming_event = Event::onlyActive()->limit(2)->orderByDesc("start")->get();
        }
    }

    public function render()
    {
        return view("livewire.{$this->menu_slug}.index")->extends("layouts.app")->section("content");
    }
}
