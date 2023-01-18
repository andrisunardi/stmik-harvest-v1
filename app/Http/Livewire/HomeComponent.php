<?php

namespace App\Http\Livewire;

use App\Mail\RegistrationMail;
use App\Models\Blog;
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
        $contact = (new RegistrationService())->add($this->validate());

        if (env('APP_ENV') == 'production') {
            Mail::to('registration@'.env('APP_DOMAIN'))->send(new RegistrationMail($contact));
        }

        $this->resetForm();

        Session::flash('success', trans('index.thank_you_for_contacting_us_we_will_reply_to_your_message_as_soon_as_possible'));
    }

    public function getNews()
    {
        return News::active()->latest('id')->limit('4')->get();
    }

    public function getMarguee()
    {
        return News::active()->latest('id')->first();
    }

    public function getPortfolios()
    {
        return Portfolio::with('portfolioCategory')->publish()->active()->latest('id')->limit('8')->get();
    }

    public function getTestimonials()
    {
        return Portfolio::with('user')->whereNotNull('testimonial')->publish()->active()->latest('id')->limit('8')->get();
    }

    public function getBlogs()
    {
        return Blog::active()->latest('id')->limit('8')->get();
    }

    public function getEndorsements()
    {
        return BuyEndorse::with('user')->active()->latest('id')->limit('8')->get();
    }

    public function getFrameworks()
    {
        return Framework::active()->orderBy('id')->get();
    }

    public function render()
    {
        return view('livewire.home.index', [
            'newss' => $this->getNews(),
            'marquee' => $this->getMarguee(),
            'portfolios' => $this->getPortfolios(),
            'testimonials' => $this->getTestimonials(),
            'blogs' => $this->getBlogs(),
            'endorsements' => $this->getEndorsements(),
            'frameworks' => $this->getFrameworks(),
        ])->extends('layouts.app')->section('content');
    }
}
