<?php

namespace Byancode\LaravelPlus\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class MakeTraitCommand extends Command
{
    public $signature = 'make:trait {name} {--s|suffix}';

    public $description = 'Create a new Trait class';

    public function handle(): int
    {
        $name = $this->argument('name');

        if ($this->option('suffix')) {
            $name .= '_trait';
        }

        $name = Str::studly($name);

        $this->mkdir();
        $this->make($name);

        $this->info("Created trait: {$name}");

        return self::SUCCESS;
    }

    public function mkdir()
    {
        $path = base_path('app/Traits');
        is_dir($path) || mkdir($path, 0755, true);
    }

    public function make($name)
    {
        $file = __DIR__.'/../../stubs/trait.stub';
        $stub = file_get_contents($file);
        $stub = str_replace('{{ name }}', $name, $stub);

        $file = base_path("app/Traits/$name.php");
        file_put_contents($file, $stub);
    }
}
