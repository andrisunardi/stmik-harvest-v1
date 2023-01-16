<?php

namespace App\Http\Livewire;

class GameViewComponent extends Component
{
    public function render()
    {
        return view('livewire.game.view')->extends('layouts.app')->section('content');
    }
}
