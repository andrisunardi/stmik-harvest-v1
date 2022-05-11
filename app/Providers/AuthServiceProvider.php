<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        // "App\Models\Model" => "App\Policies\ModelPolicy",
    ];

    public function boot()
    {
        $this->registerPolicies();

        // SPATIE ROLES
        // Gate::before(function ($user, $ability) {
        //     return $user->hasRole("Super Admin") ? true : null;
        // });

        // Gate::after(function ($user, $ability) {
        //     return $user->hasRole("Super Admin");
        // });
    }
}
