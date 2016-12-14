<?php

namespace Aitor24\Localizer\Facades;

use Aitor24\Localizer\Builder;
use Illuminate\Support\Facades\Facade;

class LocalizerFacade extends Facade
{
    /**
     * Get the registered name of the component.
     */
    public static function getFacadeAccessor()
    {
        return Builder::class;
    }
}
