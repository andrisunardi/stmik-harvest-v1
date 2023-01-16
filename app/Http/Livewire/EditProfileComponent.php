<?php

namespace App\Http\Livewire;

class EditProfileComponent extends Component
{
    public function render()
    {
        return view('livewire.profile.edit-profile')->extends('layouts.app')->section('content');
    }
}
