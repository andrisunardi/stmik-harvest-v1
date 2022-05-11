<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class DatabaseBackupDaily extends Command
{
    protected $signature = "database:backup:daily";

    protected $description = "Database Backup Daily";

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        exec("mysqldump -u " . env("DB_USERNAME") . " -p'" . env("DB_PASSWORD") . "' " . env("DB_DATABASE") . "  > " . storage_path() . "/app/database/" . date("Y-m-d") . ".sql");

        if (env("APP_ENV") == "production") {
            Mail::send("email.database", [
                "created_at" => now(),
            ], function ($message) {
                $message
                    ->to("database@" . env("APP_DOMAIN"))
                    ->cc("database@" . env("APP_DOMAIN"))
                    ->bcc("database@" . env("APP_DOMAIN"))
                    ->subject("Database Backup Daily - " . date("F d, Y"))
                    ->attach(storage_path() . "/app/database/" . date("Y-m-d") . ".sql", [
                        "as" => "database-" . date("Y-m-d") . ".sql",
                        "mime" => "application/gzip",
                    ]);
            });
        }

        Log::info("Database Backup Daily is Completed");
    }
}
