<?php

namespace App\Http\Livewire;

class ProfileComponent extends Component
{
    public function render()
    {
        return view('livewire.profile.index')->extends('layouts.app')->section('content');
    }
}
