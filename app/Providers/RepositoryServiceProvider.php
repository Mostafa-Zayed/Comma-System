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

         // Client
        $this->app->bind(
            'App\Http\Interfaces\ClientInterface',
            'App\Http\Repositories\ClientRepository'
        );

        // Main Moduel
        $this->app->bind(
            'App\Http\Interfaces\MainInterface',
            'App\Http\Repositories\MainRepository'
        );

        /* Module
        $this->app->bind(
            'App\Http\Interfaces\[Interface Name]',
            'App\Http\Repositories\[Repository Name]'
        );
        */
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
