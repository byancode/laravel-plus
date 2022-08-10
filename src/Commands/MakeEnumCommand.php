<?php

namespace Byancode\LaravelPlus\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class MakeEnumCommand extends Command
{
    public $signature = 'make:enum {name} {--s|suffix}';

    public $description = 'Create a new Enum class';

    public function handle(): int
    {
        $name = $this->argument('name');

        if ($this->option('suffix')) {
            $name .= '_enum';
        }
        $name = Str::studly($name);

        $this->mkdir();
        $this->make($name);

        $this->info("Created enum: {$name}");

        return self::SUCCESS;
    }

    public function mkdir()
    {
        $path = base_path('app/Enums');
        is_dir($path) || mkdir($path, 0755, true);
    }

    public function make($name)
    {
        $file = __DIR__.'/../../stubs/enum.stub';
        $stub = file_get_contents($file);
        $stub = str_replace('{{ name }}', $name, $stub);

        $file = base_path("app/Enums/$name.php");
        file_put_contents($file, $stub);
    }
}
