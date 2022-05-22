<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Component;
use App\Models\Banner;
use App\Models\Registration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class OnlineRegistrationComponent extends Component
{
    public $menu_name = "Online Registration";
    public $menu_icon = "fas fa-pencil-alt";
    public $menu_slug = "online-registration";
    public $menu_table = "registration";

    public $name;
    public $email;
    public $phone;
    public $gender;
    public $school;
    public $major;
    public $city;
    public $type;
    public $agree;

    public function resetInputFields()
    {
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

    public function rules()
    {
        return [
            "name"      => "required|max:50|unique:{$this->menu_table},name",
            "email"     => "required|max:50|email|unique:{$this->menu_table},email",
            "phone"     => "required|max:15|unique:{$this->menu_table},phone",
            "gender"    => "required|numeric|" . Rule::in([1, 2]),
            "school"    => "required|max:50",
            "major"     => "required|max:50",
            "city"      => "required|max:50",
            "type"      => "required|numeric|" . Rule::in([1, 2]),
        ];
    }

    public function submit()
    {
        $data = $this->validate();

        DB::statement(DB::raw("ALTER TABLE {$this->menu_table} AUTO_INCREMENT = 1"));

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

        Session::flash("success", trans("message.Thank you for online registration."));
    }

    public function mount()
    {
        $this->banner = Banner::find(9);
    }

    public function render()
    {
        return view("livewire.{$this->menu_slug}.index")
            ->extends("layouts.app")->section("content");
    }
}
