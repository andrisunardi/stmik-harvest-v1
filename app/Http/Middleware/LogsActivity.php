<?php

namespace App\Http\Middleware;

use Closure;

class LogsActivity
{
    public function handle($request, Closure $next)
    {
        if (auth()->check()) {
            $user = auth()->user();

            activity()
                ->causedBy($user)
                ->event('viewed')
                ->log("{$user->name} - {$request->fullUrl()}");
        } else {
            activity()
                ->event('viewed')
                ->log("{$request->ip()} - {$request->userAgent()} - {$request->fullUrl()}");
        }

        return $next($request);
    }
}
