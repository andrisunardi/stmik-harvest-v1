<?php

namespace App\Http\Livewire;

use App\Models\History;

class HistoryComponent extends Component
{
    public function getHistories()
    {
        return History::active()->orderBy('id')->get();
    }

    public function render()
    {
        return view('livewire.history.index', [
            'histories' => $this->getHistories(),
        ])->extends('layouts.app')->section('content');
    }
}
