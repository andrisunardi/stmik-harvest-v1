<?php

namespace App\Console\Commands;

use App\Mail\HappyBirthdayMail;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class HappyBirthdayCommand extends Command
{
    protected $signature = 'happy-birthday';

    protected $description = 'Happy Birthday';

    public function handle()
    {
        $users = User::whereMonth('birthday', now()->format('m'))
            ->whereDay('birthday', now()->format('d'))
            ->whereNotNull('email')
            ->active()
            ->orderBy('name')
            ->get();

        foreach ($users as $key => $user) {
            $key++;
            $this->line("{$key}. {$user->name} - {$user->birthday->isoFormat('LL')}");

            if (env('APP_ENV') == 'production') {
                Mail::to($user->email)->send(new HappyBirthdayMail($user));
                Mail::to('check@'.env('APP_DOMAIN'))->send(new HappyBirthdayMail($user));
            }
        }

        $this->table(
            ['#', 'ID', 'Name', 'Expired'],
            $users->map(function ($user, $key) {
                $data['#'] = $key + 1;
                $data['id'] = $user->id;
                $data['name'] = $user->name;
                $data['birthday'] = $user->birthday->isoFormat('LL');

                return $data;
            })
        );

        $userName = $users->count() ? "{$users->count()} : {$users->pluck('name')->join(', ')}" : 0;

        $this->comment("Total Happy Birthday : {$userName}");
        $this->info('Happy Birthday is Completed.');

        Log::notice("Total Happy Birthday : {$userName}");
        Log::info('Happy Birthday is Completed.');

        return Command::SUCCESS;
    }
}
