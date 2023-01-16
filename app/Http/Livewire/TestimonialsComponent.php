<?php

namespace App\Http\Livewire;

use App\Models\Portfolio;

class TestimonialsComponent extends Component
{
    public function getTestimonials()
    {
        return Portfolio::with('user')->where('testimonial', '!=', '')->publish()->active()->latest('id')->get();
    }

    public function render()
    {
        return view('livewire.testimonials.index', [
            'testimonials' => $this->getTestimonials(),
        ])->extends('layouts.app')->section('content');
    }
}
