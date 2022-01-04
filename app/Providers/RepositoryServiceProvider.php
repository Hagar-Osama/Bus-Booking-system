<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Http\Interfaces\BookingInterface',
            'App\Http\Repositories\BookingRepository'
        );

        $this->app->bind(
            'App\Http\Interfaces\tripInterface',
            'App\Http\Repositories\tripRepository'
        );


    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
