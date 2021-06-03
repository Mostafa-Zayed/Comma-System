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

         // Employee
        $this->app->bind(
            'App\Http\Interfaces\EmployeeInterface',
            'App\Http\Repositories\EmployeeRepository'
        );

         // Main Module
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
