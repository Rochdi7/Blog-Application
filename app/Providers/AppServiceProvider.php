<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        // Use Bootstrap for pagination links
        Paginator::useBootstrap();
    }

    /**
     * Register any application services.
     */
    public function register()
    {
        //
    }
}
