<?php

namespace App\Http\Livewire;

class ChangePasswordComponent extends Component
{
    public function render()
    {
        return view('livewire.profile.change-password')->extends('layouts.app')->section('content');
    }
}
