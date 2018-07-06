<?php

namespace Yemengeek\ImageOptim\Facades;

use Illuminate\Support\Facades\Facade;

class ImageOptim extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'imageoptim';
    }
}
