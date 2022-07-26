<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class LivewireTmpClear extends Command
{
    protected $signature = 'livewire-tmp:clear';

    protected $description = 'Livewire tmp Clear';

    public function handle()
    {
        array_map('unlink', array_filter((array) glob(storage_path('app/livewire-tmp/*'))));
        $this->comment('Livewire tmp have been cleared!');
        Log::info('Livewire tmp have been cleared!');
    }
}
