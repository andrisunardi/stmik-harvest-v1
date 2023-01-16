<?php

namespace App\Http\Livewire;

class GameCategoryViewComponent extends Component
{
    public function render()
    {
        return view('livewire.game.category.view')->extends('layouts.app')->section('content');
    }
}
