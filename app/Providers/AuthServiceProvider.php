<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Services\Auth\AdminGuard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Auth::extend('admin', function (Application $app, string $name, array $config) {
            // Return an instance of Illuminate\Contracts\Auth\Guard...
 
            return new AdminGuard(Auth::createUserProvider($config['provider']));
        });
    }
}
