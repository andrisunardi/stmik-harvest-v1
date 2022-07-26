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
            Route::prefix(env('APP_ENV') == 'production' ? '' : 'api')
                ->name('api')
                ->as('api.')
                ->middleware('api')
                ->namespace("App\Http\Controllers\API")
                // ->domain(env("APP_ENV") == "production" ? "www.api." . env("APP_DOMAIN") : null)
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->namespace("App\Http\Livewire")
                // ->domain(env("APP_ENV") == "production" ? "www." . env("APP_DOMAIN") : null)
                ->group(base_path('routes/web.php'));

            // Route::prefix(env("APP_ENV") == "production" ? "" : "cms")
            //     ->domain(env("APP_ENV") == "production" ? "www.cms." . env("APP_DOMAIN") : null)
            //     ->name("cms")
            //     ->as("cms.")
            //     ->middleware("web")
            //     ->namespace("App\Http\Livewire\CMS")
            //     ->group(base_path("routes/cms.php"));
        });
    }

    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
