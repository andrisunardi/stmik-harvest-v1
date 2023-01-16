<?php

namespace App\Http\Livewire;

class SettingComponent extends Component
{
    public function render()
    {
        return view('livewire.setting.index')->extends('layouts.app')->section('content');
    }
}
