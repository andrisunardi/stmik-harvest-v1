<?php

namespace App\Http\Livewire;

use App\Mail\RegistrationMail;
use App\Models\AdmissionCalendar;
use App\Models\Blog;
use App\Models\Event;
use App\Models\Offer;
use App\Models\Slider;
use App\Models\Testimony;
use App\Services\RegistrationService;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class HomeComponent extends Component
{
    public $emailNewsletter;

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
            'emailNewsletter',
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
            'email' => 'required|max:50|email:rfc,dns|unique:registration,email',
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
            Mail::to($this->email)->send(new RegistrationMail($registration));
            Mail::to('registration@'.env('APP_DOMAIN'))->send(new RegistrationMail($registration));
        }

        $this->resetForm();

        Session::flash('success', trans('index.thank_you_for_online_registration'));
    }

    public function getSliders()
    {
        return Slider::active()->latest('id')->limit(3)->get();
    }

    public function getOffers()
    {
        return Offer::active()->latest('id')->limit(4)->get();
    }

    public function getAdmissionCalendar()
    {
        return AdmissionCalendar::active()->latest('id')->first();
    }

    public function getTestimonies()
    {
        return Testimony::active()->latest('id')->limit(10)->get();
    }

    public function getBlogs()
    {
        return Blog::active()->limit(3)->latest('id')->get();
    }

    public function getEvents()
    {
        return Event::whereDate('start', '<=', now()->format('Y-m-d'))
            ->whereDate('end', '>=', now()->format('Y-m-d'))
            ->active()->limit(6)->latest('start')->get();
    }

    public function getUpcomingEvents()
    {
        return Event::whereDate('start', '>', now()->format('Y-m-d'))
            ->active()->limit(2)->latest('start')->get();
    }

    public function render()
    {
        return view('livewire.home.index', [
            'sliders' => $this->getSliders(),
            'offers' => $this->getOffers(),
            'admissionCalendar' => $this->getAdmissionCalendar(),
            'testimonies' => $this->getTestimonies(),
            'blogs' => $this->getBlogs(),
            'events' => $this->getEvents(),
            'upcomingEvents' => $this->getUpcomingEvents(),
        ])->extends('layouts.app')->section('content');
    }
}
