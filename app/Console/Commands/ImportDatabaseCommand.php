<?php

namespace App\Console\Commands;

use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ImportDatabaseCommand extends Command
{
    protected $signature = 'import:database';

    protected $description = 'Import Database';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        try {
            DB::unprepared(file_get_contents('database/sql/database.sql'));

            $this->info('Import Database is Completed');

            Log::info('Import Database is Completed.');

            return Command::SUCCESS;
        } catch (Exception $e) {
            $this->error($e);

            Log::warning($e);

            return Command::FAILURE;
        }
    }
}
