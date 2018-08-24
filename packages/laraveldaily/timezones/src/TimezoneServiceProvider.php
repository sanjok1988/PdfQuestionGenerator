<?php

namespace laraveldaily\timezones;

use Illuminate\Support\ServiceProvider;

class TimezoneServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/views','timezones');//timeszones is used in controller as view container

        //publish views in resources folder for users
        $this->publishes([
          __DIR__.'/views'=> base_path('resources/views/laraveldaily/timeszones')
        ],'views');

        $configPath = __DIR__.'/../config/config.php';

        // Publish config.
        $this->publishes([$configPath => config_path('config.php')], 'config');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
      include __DIR__.'/routes.php';
      $this->app->make('Laraveldaily\Timezones\TimezonesController');
        //
    }
}
