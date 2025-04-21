<?php
namespace CodeBider\ServiceGenerator\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class MakeService extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a new service class using a stub file';

    /**
     * Execute the console command.
     */

    public function handle()
    {
        $name = Str::studly($this->argument('name'));

        // Load from config with default fallback
        $directory = config('service-generator.path', app_path('Services'));
        $namespace = config('service-generator.namespace', 'App\\Services');

        // Full file path
        $path = $directory . "/{$name}.php";

        // Check if service already exists
        if (File::exists($path)) {
            $this->error("Service {$name} already exists!");
            return;
        }

        // Make the directory if not exists
        if (! File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        // Load stub: check stubs override first, then fallback to package
        $stubPath = base_path('stubs/service.stub');
        if (! File::exists($stubPath)) {
            $stubPath = __DIR__ . '/../../../stubs/service.stub'; // Adjust path for your package structure
        }

        if (! File::exists($stubPath)) {
            $this->error("Stub file not found.");
            return;
        }

        // Replace class and namespace in stub
        $stubContent         = File::get($stubPath);
        $serviceClassContent = str_replace(
            ['{{ namespace }}', '{{ class }}'],
            [$namespace, $name],
            $stubContent
        );

        // Save the file
        File::put($path, $serviceClassContent);

        $this->info("Service {$name} created successfully at {$path}!");
    }

}
