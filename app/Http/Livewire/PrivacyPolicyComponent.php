<?php

namespace App\Http\Livewire;

class PrivacyPolicyComponent extends Component
{
    public function render()
    {
        return view('livewire.privacy-policy.index')->extends('layouts.app')->section('content');
    }
}
