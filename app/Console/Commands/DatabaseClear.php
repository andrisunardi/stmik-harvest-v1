<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class DatabaseClear extends Command
{
    protected $signature = 'database:clear';

    protected $description = 'Database Clear';

    public function handle()
    {
        array_map('unlink', array_filter((array) glob(storage_path('app/database/*.sql'))));
        $this->comment('Database have been cleared!');
        Log::info('Database have been cleared!');
    }
}
