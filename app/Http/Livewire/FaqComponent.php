<?php

namespace App\Http\Livewire;

use App\Models\Faq;

class FaqComponent extends Component
{
    public function getFaqs()
    {
        return Faq::active()->orderBy('id')->get();
    }

    public function render()
    {
        return view('livewire.faq.index', [
            'faqs' => $this->getFaqs(),
        ])->extends('layouts.app')->section('content');
    }
}
