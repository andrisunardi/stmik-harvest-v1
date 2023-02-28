<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class EnvoyClearCommand extends Command
{
    protected $signature = 'envoy:clear';

    protected $description = 'Envoy Clear';

    public function handle()
    {
        array_map('unlink', array_filter((array) glob(base_path('Envoy*'))));

        $this->info('Envoy have been cleared.');

        Log::info('Envoy have been cleared.');

        return Command::SUCCESS;
    }
}
