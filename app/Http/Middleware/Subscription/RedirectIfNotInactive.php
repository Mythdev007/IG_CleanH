<?php

namespace App\Http\Middleware\Subscription;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotInactive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $company = Auth::user()->companyContext();

        if (optional($company)->hasSubscription()) {
            return redirect()->route('dashboard');
        }

        return $next($request);
    }
}
