<?php

namespace App\Http\Livewire;

use App\Mail\ContactMail;
use App\Models\Banner;
use App\Services\ContactService;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class ContactUsComponent extends Component
{
    public $name;

    public $company;

    public $email;

    public $phone;

    public $subject;

    public $message;

    public function resetForm()
    {
        $this->reset([
            'name',
            'company',
            'email',
            'phone',
            'subject',
            'message',
        ]);
    }

    public function rules()
    {
        return [
            'name' => 'required|max:50',
            'company' => 'nullable|max:50',
            'email' => 'required|max:50|email:rfc,dns|regex:/^\S*$/u',
            'phone' => 'nullable|max:15',
            'subject' => 'required|max:100',
            'message' => 'required|max:1000',
        ];
    }

    public function submit()
    {
        $contact = (new ContactService())->add($this->validate());

        if (env('APP_ENV') == 'production') {
            Mail::to('contact@'.env('APP_DOMAIN'))->send(new ContactMail($contact));
        }

        $this->resetForm();

        Session::flash('success', trans('index.thank_you_for_contacting_us_we_will_reply_to_your_message_as_soon_as_possible'));
    }

    public function getBanner()
    {
        return Banner::find(16);
    }

    public function render()
    {
        return view('livewire.contact-us.index')->extends('layouts.app', [
            'banner' => $this->getBanner(),
        ])->section('content');
    }
}
