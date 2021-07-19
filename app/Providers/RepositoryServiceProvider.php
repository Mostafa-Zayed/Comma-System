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

        // Type Module
        $this->app->bind(
            'App\Http\Interfaces\TypeInterface',
            'App\Http\Repositories\TypeRepository'
        );


        // Room Module
        $this->app->bind(
            'App\Http\Interfaces\RoomInterface',
            'App\Http\Repositories\RoomRepository'
        );

        // Session Module
        $this->app->bind(
            'App\Http\Interfaces\SessionInterface',
            'App\Http\Repositories\SessionRepository'
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
