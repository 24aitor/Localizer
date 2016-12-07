<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Default settings for localizer
    |--------------------------------------------------------------------------
    */
    'default'   => [
        'routes'         => true,
        'select_lang_routes' => true,
        'set_auto_lang' => true,
        'prefix'         => 'localizer',
        'middleware'     => Aitor24\Localizer\Middlewares\LocalizerMiddleware::class,
    ],
];
