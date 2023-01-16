<?php

namespace App\Http\Livewire;

class GameCategoryComponent extends Component
{
    public function render()
    {
        return view('livewire.game.category')->extends('layouts.app')->section('content');
    }
}
