<?php

namespace Rpgroot\Youtubeuploader\Facades;

use Illuminate\Support\Facades\Facade;

class Youtubeuploader extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'youtubeuploader';
    }
}