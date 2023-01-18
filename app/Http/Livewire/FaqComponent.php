<?php

namespace App\Http\Livewire;

use App\Models\Banner;
use App\Models\Faq;

class FaqComponent extends Component
{
    public function getBanner()
    {
        return Banner::find(6);
    }

    public function getFaqs()
    {
        return Faq::active()->orderBy('id')->get();
    }

    public function render()
    {
        return view('livewire.faq.index', [
            'banner' => $this->getBanner(),
            'faqs' => $this->getFaqs(),
        ])->extends('layouts.app', [
            'banner' => $this->getBanner(),
        ])->section('content');
    }
}
