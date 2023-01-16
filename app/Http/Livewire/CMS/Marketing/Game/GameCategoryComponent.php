<?php

namespace App\Http\Livewire\CMS\Marketing\Game;

use App\Http\Livewire\CMS\Component;

class GameCategoryComponent extends Component
{
    public function render()
    {
        return view('cms.livewire.news.index')->extends('layouts.app')->section('content');
    }
}
