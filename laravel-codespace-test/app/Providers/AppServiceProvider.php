<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Force Laravel to use the correct URL
        if ($this->app->environment('local')) {
            URL::forceRootUrl(config('app.url'));

            if (str_contains(config('app.url'), 'https://')) {
                URL::forceScheme('https');
            }
        }
    }
}