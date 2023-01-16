<?php

namespace App\Http\Livewire;

use App\Models\BuyEndorse;

class EndorsementComponent extends Component
{
    public function getEndorsements()
    {
        return BuyEndorse::with('user')->active()->latest('id')->paginate(10);
    }

    public function render()
    {
        return view('livewire.endorsement.index', [
            'endorsements' => $this->getEndorsements(),
        ])->extends('layouts.app')->section('content');
    }
}
