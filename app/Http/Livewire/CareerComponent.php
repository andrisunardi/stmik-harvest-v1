<?php

namespace App\Http\Livewire;

use App\Models\Career;

class CareerComponent extends Component
{
    public function getCareers()
    {
        return Career::active()->latest('id')->paginate(10);
    }

    public function render()
    {
        return view('livewire.career.index', [
            'careers' => $this->getCareers(),
        ]
        )->extends('layouts.app')->section('content');
    }
}
