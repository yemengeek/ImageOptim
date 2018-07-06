<?php

namespace Yemengeek\ImageOptim;

use Illuminate\Support\ServiceProvider;

class ImageOptimServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        require_once __DIR__.'/../vendor/autoload.php';

        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'yemengeek');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'yemengeek');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {

            // Publishing the configuration file.
            $this->publishes([
                __DIR__.'/../config/imageoptim.php' => config_path('imageoptim.php'),
            ], 'imageoptim.config');


            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => base_path('resources/views/vendor/yemengeek'),
            ], 'imageoptim.views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/yemengeek'),
            ], 'imageoptim.views');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/yemengeek'),
            ], 'imageoptim.views');*/

            // Registering package commands.
            // $this->commands([]);
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/imageoptim.php', 'imageoptim');

        // Register the service the package provides.
        $this->app->singleton('imageoptim', function ($app) {
            return new ImageOptim;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['imageoptim'];
    }
}
