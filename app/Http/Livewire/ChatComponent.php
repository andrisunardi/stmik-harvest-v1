<?php

namespace App\Http\Livewire;

class ChatComponent extends Component
{
    public function render()
    {
        return view('livewire.chat.index')->extends('layouts.app')->section('content');
    }
}
