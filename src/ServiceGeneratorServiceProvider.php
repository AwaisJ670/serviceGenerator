<?php

namespace CodeBider\ServiceGenerator;

use Illuminate\Support\ServiceProvider;
use CodeBider\ServiceGenerator\Console\Commands\MakeService;


class ServiceGeneratorServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/service-generator.php', 'service-generator');
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            // Register the command
            $this->commands([
                MakeService::class,
            ]);

            // Publish the stub file
            $this->publishes([
                __DIR__.'/../stubs/service.stub' => base_path('stubs/service.stub'),
            ], 'stubs');
        }
    }
}
