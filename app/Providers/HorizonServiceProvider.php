<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Laravel\Horizon\Horizon;
use Laravel\Horizon\HorizonApplicationServiceProvider;

class HorizonServiceProvider extends HorizonApplicationServiceProvider
{
    public function boot()
    {
        parent::boot();

        Horizon::routeSmsNotificationsTo('+6287871113361');
        Horizon::routeMailNotificationsTo('info@diw.co.id');
        Horizon::routeSlackNotificationsTo('https://hooks.slack.com/services/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', '#horizon');

        Horizon::night();
    }

    protected function gate()
    {
        Gate::define('viewHorizon', function ($user) {
            return $user->hasRole('Super User');
        });
    }
}
