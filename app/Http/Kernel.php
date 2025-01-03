<?php

namespace App\Http;

use Illuminate\Http\Request;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array<int, \Illuminate\Console\Command>
     */
   protected $commands = [
     //    \App\Console\Commands\ExampleCommand::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('example')->daily();
    }

    /**
     * Define the application's middleware.
     *
     * @var array
     */
  protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\TrimStrings::class,
        \Illuminate\Http\Middleware\TrustProxies::class,
     //    \App\Http\Middleware\TrustHosts::class,
    ];

   /**
     * Define the application's route middleware.
     *
     * @var array
     */
    protected $routeMiddleware = [
     //     'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
         'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
         'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
         'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
         'can' => \Illuminate\Auth\Middleware\Authorize::class,
         'guest' => \Illuminate\Auth\Middleware\RedirectIfAuthenticated::class,
         'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
         //    'signed' => \Illuminate\Auth\Middleware\ValidateSignature::class,
         'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
         'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
         'role' => \App\Http\Middleware\RoleMiddleware::class,
    ];

    /**
     * Register the application's service providers.
     *
     * @return void
     */
  public function register()
    {
        // Register core service providers...

        // Register other service providers...
    }

    /**
     * Bootstrap the application for HTTP requests.
     *
     * @return void
     */
    public function bootstrap()
    {
      function boot()
     {
         // You can add your code here to register bindings in the service container
     }
    }
}
