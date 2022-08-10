<?php

namespace Byancode\LaravelPlus\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Byancode\LaravelPlus\LaravelPlus
 */
class LaravelPlus extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Byancode\LaravelPlus\LaravelPlus::class;
    }
}
