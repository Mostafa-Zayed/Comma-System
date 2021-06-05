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
         // Employee Module
        $this->app->bind(
            'App\Http\Interfaces\EmployeeInterface',
            'App\Http\Repositories\EmployeeRepository'
        );

        // Main Module
        $this->app->bind(
            'App\Http\Interfaces\MainInterface',
            'App\Http\Repositories\MainRepository'
        );

        // Client Module
        $this->app->bind(
            'App\Http\Interfaces\ClientInterface',
            'App\Http\Repositories\ClientRepository'
        );

//        // Category Module
//        $this->app->bind(
//            'App\Http\Interfaces\CategoryInterface',
//            'App\Http\Repositories\CategoryRepository'
//        );


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
