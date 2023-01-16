<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class LogsClearCommand extends Command
{
    protected $signature = 'logs:clear';

    protected $description = 'Logs Clear';

    public function handle()
    {
        array_map('unlink', array_filter((array) glob(storage_path('logs/*.log'))));

        $this->info('Logs have been cleared.');

        Log::info('Logs have been cleared.');

        return Command::SUCCESS;
    }
}
