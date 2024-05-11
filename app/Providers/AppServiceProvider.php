<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (app()->isProduction() || config('app.force_https')) {
            ($this->{'app'}['request'] ?? null)?->server?->set('HTTPS', 'on');
            \Illuminate\Support\Facades\URL::forceScheme('https');
        }
    }
}
