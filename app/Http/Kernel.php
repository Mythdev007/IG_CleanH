<?php

namespace App\Http;

use App\Http\Middleware\Vaance\CurrentCompanyMiddleware;
use App\Http\Middleware\Vaance\JsonMiddleware;
use App\Http\Middleware\Vaance\PermissionMiddleware;
use App\Http\Middleware\Vaance\RoleMiddleware;
use App\Http\Middleware\Vaance\UserMailConfig;
use App\Http\Middleware\LocaleMiddleware;
use Illuminate\Foundation\Http\Kernel as HttpKernel;
use Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
        \App\Http\Middleware\TrustProxies::class,
        \App\Http\Middleware\Vaance\XSSProtection::class
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
            \App\Http\Middleware\LocaleMiddleware::class,
            CurrentCompanyMiddleware::class,
            ConvertEmptyStringsToNull::class,
        ],

        'api' => [
            'throttle:60,1',
            'bindings',
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'role' => RoleMiddleware::class,
        'permission' => PermissionMiddleware::class,
        'json.request' => JsonMiddleware::class,

        'subscription.active' =>  \App\Http\Middleware\Subscription\RedirectIfNotActive::class,
        'subscription.inactive' => \App\Http\Middleware\Subscription\RedirectIfNotInactive::class,
        'subscription.notcancelled' => \App\Http\Middleware\Subscription\RedirectIfCancelled::class,
        'subscription.cancelled' => \App\Http\Middleware\Subscription\RedirectIfNotCancelled::class,
        'subscription.customer' => \App\Http\Middleware\Subscription\RedirectIfNotCustomer::class,
    ];
}
