<?php

namespace App\Http\Livewire;

class GameComponent extends Component
{
    public function render()
    {
        return view('livewire.game.index')->extends('layouts.app')->section('content');
    }
}
