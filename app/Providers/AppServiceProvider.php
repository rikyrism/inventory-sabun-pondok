<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

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
        // Set default string length for all tables
        Schema::defaultStringLength(191);
        
        // Ensure correct locale settings
        $locale = config('app.locale');
        config(['app.locale' => $locale]);
        Carbon::setLocale($locale);
    }
}
