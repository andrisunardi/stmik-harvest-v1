<?php

namespace App\Http\Livewire;

use App\Models\Banner;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class ContactUsComponent extends Component
{
    public $menu_name = 'Contact Us';

    public $menu_icon = 'fas fa-phone-alt';

    public $menu_slug = 'contact-us';

    public $menu_table = 'contact';

    public $name;

    public $email;

    public $phone;

    public $company;

    public $message;

    public function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->company = '';
        $this->message = '';
    }

    public function rules()
    {
        return [
            'name' => 'required|max:50',
            'phone' => 'nullable|max:20',
            'email' => 'required|email|max:50',
            'company' => 'nullable|max:50',
            'message' => 'required|max:1000',
        ];
    }

    public function submit()
    {
        $data = $this->validate();

        if (env('APP_ENV') != 'testing') {
            DB::statement(DB::raw("ALTER TABLE {$this->menu_table} AUTO_INCREMENT = 1"));
        }

        $contact = Contact::create($data);

        if (env('APP_ENV') == 'production') {
            Mail::send('email.contact', [
                'contact' => $contact,
                'created_at' => now(),
            ], function ($message) {
                $message
                    ->to(env('CONTACT_EMAIL'))
                    ->cc(env('CONTACT_EMAIL'))
                    ->bcc(env('CONTACT_EMAIL'))
                    ->subject('Contact Form - '.date('d F Y'));
            });
        }

        $this->resetInputFields();
        $this->resetValidation();

        Session::flash('success', trans('index.thank_you_for_contacting_us_we_will_answer_as_soon_as_possible'));
    }

    public function mount()
    {
        $this->banner = Banner::find(16);
    }

    public function render()
    {
        return view("livewire.{$this->menu_slug}.index")->extends('layouts.app', ['banner' => $this->banner])->section('content');
    }
}
