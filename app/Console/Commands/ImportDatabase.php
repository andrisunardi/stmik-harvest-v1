<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class ImportDatabase extends Command
{
    protected $signature = "import:database";

    protected $description = "Import Database";

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        try {
            DB::unprepared(file_get_contents("database/sql/database.sql"));
            $this->info("Import Database is Completed");
        } catch (\Exception $e) {
            var_dump($e->getMessage());
        }

        Log::info("Import Database is Completed");
    }
}
