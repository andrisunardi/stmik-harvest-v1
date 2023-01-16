<?php

namespace App\Http\Livewire\CMS\Hrd;

use App\Http\Livewire\CMS\Component;

class EndorseComponent extends Component
{
    public function render()
    {
        return view("{$this->subDomain}.livewire.endorse.index")
            ->extends("{$this->subDomain}.layouts.app")
            ->section('content');
    }
}
