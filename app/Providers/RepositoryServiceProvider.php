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
         // Testing
        $this->app->bind(
            'App\Http\Interfaces\TestingInterface',
            'App\Http\Repositories\TestingRepository'
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
