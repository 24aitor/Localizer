<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Default settings for localizer
    |--------------------------------------------------------------------------
    */
    'default'   => [
        'routes'         => true,
        'prefix'         => 'localizer',
        'middleware'     => Aitor24\Localizer\Middlewares\LocalizerMiddleware::class,
    ],
];
