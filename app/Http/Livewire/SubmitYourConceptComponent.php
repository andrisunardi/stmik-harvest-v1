<?php

namespace App\Http\Livewire;

class SubmitYourConceptComponent extends Component
{
    public function render()
    {
        return view('livewire.submit-your-concept.index')->extends('layouts.app')->section('content');
    }
}
