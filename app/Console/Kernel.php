<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('database:backup:daily')->daily();
        $schedule->command('livewire-tmp:clear')->daily();
        $schedule->command('logs:clear')->monthly();
        $schedule->command('database:clear')->monthly();
        $schedule->command('telescope:prune')->monthly();
        $schedule->command('activitylog:clean')->daily();
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
