<?php

declare(strict_types=1);

namespace Codelikes\LookupValue;

use Illuminate\Support\ServiceProvider;

class LookupValueServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerPublish();
    }


    public function register()
    {
        $this->app->bind('LookupValue', function () {
            return new LookupValue();
        });


        $this->app->alias('LookupValue', Facade::class);


        $this->mergeConfigFrom(
            __DIR__ . '/../config/lookupvalues.php',
            'lookupvalues'
        );
    }

    protected function registerPublish()
    {
        $this->publishes([
            __DIR__ . '/../config/lookupvalues.php' => config_path('lookupvalues.php')
        ], 'config');
    }
}
