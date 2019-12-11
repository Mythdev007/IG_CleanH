<?php

namespace App\Http\Middleware\Subscription;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfCancelled
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $company = Auth::user()->companyContext();

        if (! $company->hasSubscription() || $company->hasCancelled()) {
            return redirect()->route('dashboard');
        }

        return $next($request);
    }
}
