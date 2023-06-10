<?php

namespace App\Console\Commands;

use App\Mail\DatabaseBackupDailyMail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class DatabaseBackupDailyCommand extends Command
{
    protected $signature = 'database:backup:daily';

    protected $description = 'Database Backup Daily';

    public function handle()
    {
        exec('mysqldump -u '.env('DB_USERNAME')." -p'".env('DB_PASSWORD')."' ".env('DB_DATABASE').'  > '.storage_path().'/app/database/'.date('Y-m-d').'.sql');

        if (env('APP_ENV') == 'production') {
            Mail::to('database@'.env('APP_DOMAIN'))->send(new DatabaseBackupDailyMail());
        }

        $this->info('Database Backup Daily is Completed.');

        Log::info('Database Backup Daily is Completed.');

        return Command::SUCCESS;
    }
}
