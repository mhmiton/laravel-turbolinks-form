<?php

namespace Mhmiton\LaravelTurbolinksForm;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class LaravelTurbolinksFormServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/turbolinks-form.php', 'turbolinks-form');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPublishables();

        $this->registerComponents();

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'turbolinks-form');
    }

    protected function registerPublishables()
    {
        if (! $this->app->runningInConsole()) return;

        $this->publishes([
            __DIR__.'/../config/turbolinks-form.php' => base_path('config/turbolinks-form.php'),
        ], 'config');

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/turbolinks-form'),
        ], 'views');
    }

    public function registerComponents()
    {
        if (app()->version() >= 7) {
            Blade::component('turbolinks-form::scripts', 'turbolinks-form::scripts');
        }
    }
}