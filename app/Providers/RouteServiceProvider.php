<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    public const HOME = '/home';

    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('api')
                ->namespace("App\Http\Controllers\API")
                ->name('api')
                ->as('api.')
                ->prefix('api')
                // ->prefix(env('APP_ENV') == 'production' ? '' : 'api')
                // ->domain(env("APP_ENV") == "production" ? "www.api." . env("APP_DOMAIN") : null)
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->namespace("App\Http\Livewire\CMS")
                ->name('cms')
                ->as('cms.')
                ->prefix('cms')
                // ->prefix(env("APP_ENV") == "production" ? "" : "cms")
                // ->domain(env("APP_ENV") == "production" ? "www.cms." . env("APP_DOMAIN") : null)
                ->group(base_path('routes/cms.php'));

            Route::middleware('web')
                ->namespace("App\Http\Livewire")
                // ->domain(env("APP_ENV") == "production" ? "www." . env("APP_DOMAIN") : null)
                ->group(base_path('routes/web.php'));
        });
    }

    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
