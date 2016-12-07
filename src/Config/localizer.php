<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Default settings for localizer
    |--------------------------------------------------------------------------
    */
    'default'   => [
        'routes'             => true,
        'select_lang_routes' => true, // If routes is false has no effect
        'set_auto_lang'      => true,
        'default_lang'       => 'en', // If set_auto_lang is true has no effect
        'prefix'             => 'localizer',
        'middleware'         => Aitor24\Localizer\Middlewares\LocalizerMiddleware::class,
    ],
];
