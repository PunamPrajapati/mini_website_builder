<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeService extends Command
{
    protected $signature = 'make:service {name}';
    protected $description = 'Create a new Service class';

    public function handle()
    {
        $name = $this->argument('name');
        $directory = app_path('Services');
        $path = "$directory/{$name}.php";

        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        if (File::exists($path)) {
            $this->error('Service already exists!');
            return;
        }

        $stub = "<?php

namespace App\Services;

class {$name}
{
    //
}
";
        File::put($path, $stub);
        $this->info("Service {$name} created successfully.");
    }
}
