<?php

namespace CodeBider\ServiceGenerator\Tests\Feature;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Orchestra\Testbench\TestCase;
use CodeBider\ServiceGenerator\ServiceGeneratorServiceProvider;

class MakeServiceCommandTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            ServiceGeneratorServiceProvider::class,
        ];
    }

    public function test_it_creates_service_class()
    {
        $serviceName = 'TestInventoryService';
        $servicePath = app_path("Services/{$serviceName}.php");

        // Clean up before test
        if (File::exists($servicePath)) {
            File::delete($servicePath);
        }

        // Run the artisan command
        Artisan::call('make:service', ['name' => $serviceName]);

        // Assert that file was created
        $this->assertTrue(File::exists($servicePath));

        // Assert the file content
        $content = File::get($servicePath);
        $this->assertStringContainsString("class {$serviceName}", $content);

        // Clean up after test
        File::delete($servicePath);
    }
}
