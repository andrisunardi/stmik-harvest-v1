<?php

namespace App\Http\Livewire;

class TermsAndConditionsComponent extends Component
{
    public function render()
    {
        return view('livewire.terms-and-conditions.index')->extends('layouts.app')->section('content');
    }
}
