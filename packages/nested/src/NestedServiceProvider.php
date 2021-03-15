<?php

namespace Nested;

use Laranext\Laranext;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class NestedServiceProvider extends ServiceProvider
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
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerMigrations();
        $this->registerResources();
        $this->registerRoutes();
    }

    /**
     * Register the package migrations.
     *
     * @return void
     */
    protected function registerMigrations()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }

    /**
     * Register the package resources such as routes, templates, etc.
     *
     * @return void
     */
    protected function registerResources()
    {
        $this->app->config->set(['view.paths' => [
            __DIR__.'/../resources/views/',
        ]]);
    }

    /**
     * Register the package routes.
     *
     * @return void
     */
    protected function registerRoutes()
    {
        Route::group([
            'namespace' => 'Nested\Http\Controllers\Api',
            'middleware' => ['web', 'auth'],
            'prefix' => Laranext::prefix() . '/abc/api',
        ], function () {
            $this->loadRoutesFrom(__DIR__.'/../routes/api.php');
        });

        Route::group([
            'namespace' => 'Nested\Http\Controllers',
            'middleware' => ['web'],
            'prefix' => Laranext::prefix(),
        ], function () {
            $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        });
    }
}
