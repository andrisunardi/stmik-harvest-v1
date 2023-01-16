<?php

namespace App\Console\Commands;

use App\Enums\PortfolioStatus;
use App\Mail\PortfolioExpiredOneMonthNoticeMail;
use App\Models\Portfolio;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class PortfolioExpiredOneMonthNoticeCommand extends Command
{
    protected $signature = 'portfolio-expired-one-month-notice';

    protected $description = 'Portfolio Expired One Month Notice';

    public function handle()
    {
        $this->line('Portfolio Expired One Month Notice');

        $portfolios = Portfolio::with('user')
            ->whereDate('expired', now()->addMonth()->format('Y-m-d'))
            ->where('status', PortfolioStatus::Finish)
            ->active()
            ->orderBy('expired')
            ->get();

        foreach ($portfolios as $key => $portfolio) {
            $key++;
            $this->line("{$key}. {$portfolio->name} - {$portfolio->expired->isoFormat('LL')}");

            if (env('APP_ENV') == 'production') {
                if ($portfolio->user->email) {
                    Mail::to($portfolio->user->email)->send(new PortfolioExpiredOneMonthNoticeMail($portfolio));
                    Mail::to('check@'.env('APP_DOMAIN'))->send(new PortfolioExpiredOneMonthNoticeMail($portfolio));
                }
            }
        }

        $portfolioName = $portfolios->count() ? "{$portfolios->count()} : {$portfolios->pluck('name')->join(', ')}" : 0;

        $this->line("Total Portfolio Expired One Month Notice : {$portfolioName}");

        $this->table(
            ['#', 'ID', 'Name', 'Expired'],
            $portfolios->map(function ($portfolio, $key) {
                $data['#'] = $key + 1;
                $data['id'] = $portfolio->id;
                $data['name'] = $portfolio->name;
                $data['expired'] = $portfolio->expired->isoFormat('LL');

                return $data;
            })
        );

        $this->comment('Portfolio Expired One Month Notice is Completed');

        Log::info('Portfolio Expired One Month Notice is Completed');

        return Command::SUCCESS;
    }
}
