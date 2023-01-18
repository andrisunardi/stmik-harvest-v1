<?php

namespace App\Http\Livewire;

use App\Mail\RegistrationMail;
use App\Models\Banner;
use App\Services\RegistrationService;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class OnlineRegistrationComponent extends Component
{
    public $name;

    public $email;

    public $phone;

    public $gender;

    public $school;

    public $major;

    public $city;

    public $type;

    public $agree;

    public function resetForm()
    {
        $this->reset([
            'name',
            'email',
            'phone',
            'gender',
            'school',
            'major',
            'city',
            'type',
            'agree',
        ]);
    }

    public function rules()
    {
        return [
            'name' => 'required|max:50|unique:registration,name',
            'email' => 'required|max:50|email|unique:registration,email',
            'phone' => 'required|max:20|unique:registration,phone',
            'gender' => 'required|numeric|'.Rule::in([1, 2]),
            'school' => 'required|max:50',
            'major' => 'required|max:50',
            'city' => 'required|max:50',
            'type' => 'required|numeric|'.Rule::in([1, 2]),
        ];
    }

    public function submit()
    {
        $registration = (new RegistrationService())->add($this->validate());

        if (env('APP_ENV') == 'production') {
            Mail::to('registration@'.env('APP_DOMAIN'))->send(new RegistrationMail($registration));
        }

        $this->resetForm();

        Session::flash('success', trans('index.thank_you_for_online_registration'));
    }

    public function getBanner()
    {
        return Banner::find(7);
    }

    public function render()
    {
        return view('livewire.online-registration.index', [
            'banner' => $this->getBanner(),
        ])->extends('layouts.app')->section('content');
    }
}
