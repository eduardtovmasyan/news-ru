<?php

namespace App\Providers;

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
        $this->app->bind('news', 'App\Services\NewsService');
        $this->app->bind('parser', 'App\Services\ParserService');
        $this->app->bind('parserLog', 'App\Services\ParserLogService');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
