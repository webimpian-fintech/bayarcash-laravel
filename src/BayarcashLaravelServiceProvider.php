<?php

namespace Webimpian\BayarcashLaravel;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class BayarcashLaravelServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function register()
    {
        if (!defined('BAYARCASH_LARAVEL_PATH')) {
            define('BAYARCASH_LARAVEL_PATH', realpath(__DIR__ . '/../'));
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerRoutes();
        $this->registerResources();
        $this->defineAssetPublishing();
        $this->offerPublishing();
    }

    /**
     * Register the Bayarcash Laravel routes.
     *
     * @return void
     */
    protected function registerRoutes()
    {
        Route::group([
            'prefix' => config('bayarcash-laravel.route_prefix'),
            'namespace' => 'Webimpian\BayarcashLaravel\Http\Controllers',
            'middleware' => config('bayarcash-laravel.middleware', 'web'),
        ], function () {
            $this->loadRoutesFrom(BAYARCASH_LARAVEL_PATH . '/routes.php');
        });
    }

    /**
     * Register the Bayarcash Laravel resources.
     *
     * @return void
     */
    protected function registerResources()
    {
        $this-> loadViewsFrom(BAYARCASH_LARAVEL_PATH . '/views', 'bayarcash-laravel');
    }

    /**
     * Define the asset publishing configuration.
     *
     * @return void
     */
    protected function defineAssetPublishing()
    {
        $this->publishes([
            BAYARCASH_LARAVEL_PATH . '/public' => public_path('vendor/bayarcash-laravel'),
        ], 'bayarcash-laravel-assets');
    }

    /**
     * Setup the resource publishing groups for Bayarcash Laravel.
     *
     * @return void
     */
    protected function offerPublishing()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                BAYARCASH_LARAVEL_PATH . '/stubs/Http/Controllers/PaymentController.stub' => app_path('Http/Controllers/PaymentController.php'),
            ], 'bayarcash-laravel-controller');

            $this->publishes([
                BAYARCASH_LARAVEL_PATH . '/stubs/Http/Requests/PaymentRequest.stub' => app_path('Http/Requests/PaymentRequest.php'),
            ], 'bayarcash-laravel-form-request');

            $this->publishes([
                BAYARCASH_LARAVEL_PATH . '/config/bayarcash-laravel.php' => config_path('bayarcash-laravel.php'),
            ], 'bayarcash-laravel-config');
        }
    }
}
