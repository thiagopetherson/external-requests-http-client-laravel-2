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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(
            'App\Interfaces\MovieInterface',
            'App\Repositories\MovieRepository'
        );

        $this->app->bind(
            'App\Interfaces\GenreInterface',
            'App\Repositories\GenreRepository'
        );
    }
}
