<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeRepository extends Command
{
    protected $signature = 'make:repository {name}';
    protected $description = 'Create a new Repository class';

    public function handle()
    {
        $name = $this->argument('name');
        $directory = app_path('Repositories');
        $path = "$directory/{$name}.php";

        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        if (File::exists($path)) {
            $this->error('Repository already exists!');
            return;
        }

        $stub = "<?php

namespace App\Repositories;

class {$name}
{
    //
}
";
        File::put($path, $stub);
        $this->info("Repository {$name} created successfully.");
    }
}
