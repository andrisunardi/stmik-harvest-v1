<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use App\Models\BuyEndorse;
use App\Models\Framework;
use App\Models\News;
use App\Models\Portfolio;

class HomeComponent extends Component
{
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
