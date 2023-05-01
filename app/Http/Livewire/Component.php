<?php

namespace App\Http\Livewire;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component as LivewireComponent;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Component extends LivewireComponent
{
    use LivewireAlert;
    use WithPagination;
    use WithFileUploads;
    use AuthorizesRequests;
}
