<?php

namespace App\Http\Middleware;

use Closure;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                return redirect(RouteServiceProvider::HOME);

                if (Route::is("cms.*")) {
                    return redirect()->route("cms.index")->withInfo("You already login");
                }

                return redirect()->route("index")->withInfo("You already login");
            }
        }

        return $next($request);
    }
}
