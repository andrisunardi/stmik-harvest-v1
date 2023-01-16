<?php

namespace App\Http\Livewire;

use App\Models\Quote;

class QuoteComponent extends Component
{
    public function getQuotes()
    {
        return Quote::active()->latest('id')->get();
    }

    public function render()
    {
        return view('livewire.quote.index', [
            'quotes' => $this->getQuotes(),
        ])->extends('layouts.app')->section('content');
    }
}
