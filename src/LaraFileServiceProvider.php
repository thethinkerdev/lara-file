<?php

namespace Samkhdev\LaraFile;

use Illuminate\Support\ServiceProvider;

class LaraFileServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->mergeConfigFrom(__DIR__ . '/config/laraFile.php', 'lara-file');
        $this->publishes([
            __DIR__ . '/config/laraFile.php' => config_path('laraFile.php')
        ]);
    }
    public function register()
    {
    }
}
