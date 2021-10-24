<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

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
        // \App\Http\Middleware\TrustHosts::class,
        \App\Http\Middleware\TrustProxies::class,
        \Fruitcake\Cors\HandleCors::class,
        \App\Http\Middleware\PreventRequestsDuringMaintenance::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
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
        ],

        'api' => [
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
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
        'auth.all' => \App\Http\Middleware\AllMiddleware::class,
        'auth.admin' => \App\Http\Middleware\AdminMiddleware::class,
        'auth.superadmin' => \App\Http\Middleware\SuperAdminMiddleware::class,
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        //Middlewares for access restriction
        'companies.access' => \App\Http\Middleware\CompaniesAccess::class,
        'bookmarkers.access' => \App\Http\Middleware\BookMarkersAccess::class,
        'bookmarkersrecords.access' => \App\Http\Middleware\BookmarkersRecordsAccess::class,
        'publiclotterycompany.access' => \App\Http\Middleware\PublicLotteryCompanyAccess::class,
        'accounts.access' => \App\Http\Middleware\AccountsAccess::class,
        'publiclottery.access' => \App\Http\Middleware\PublicLotteryRecordsAccess::class,
        'publicgaming.access' => \App\Http\Middleware\PublicGamingAccess::class,
        'bookmarkerscompany.access' => \App\Http\Middleware\BookMarkersCompanyAccess::class,
        'publicgamingcompany.access' => \App\Http\Middleware\PublicGamingCompanyAccess::class,
        'registry.access' => \App\Http\Middleware\RegistryAccess::class,
        'fileregistry.access' => \App\Http\Middleware\FileRegistryAccess::class,
        'assignregistry.access' => \App\Http\Middleware\TaskingAccess::class,

        
        
        /////
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
    ];
}
