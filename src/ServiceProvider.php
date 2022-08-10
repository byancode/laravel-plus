<?php

namespace Byancode\LaravelPlus;

use Byancode\LaravelPlus\Commands\MakeEnumCommand;
use Byancode\LaravelPlus\Commands\MakeLibraryCommand;
use Byancode\LaravelPlus\Commands\MakePivotCommand;
use Byancode\LaravelPlus\Commands\MakeTraitCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class ServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-plus')
            // ->hasConfigFile('laravel-plus')
            // ->hasViews()
            // ->hasMigration('create_laravel-plus_table')
            ->hasCommands([
                MakeEnumCommand::class,
                MakePivotCommand::class,
                MakeTraitCommand::class,
                MakeLibraryCommand::class,
            ]);
    }
}
