<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Default settings for localizer
    |--------------------------------------------------------------------------
    */
    'routes'             => true,
    'https'              => false, // Set true if your web is under https
    'select_lang_routes' => true, // If routes is false has no effect
    'set_auto_lang'      => true,
    'default_lang'       => 'en', // If set_auto_lang is true has no effect
    'prefix'             => 'localizer',
    'allowed_langs'      => [], // If is NULL, all Laralang languages will be used. Example of use ['ca', 'es', 'en'],
    'middleware'         => Aitor24\Localizer\Middlewares\LocalizerMiddleware::class,
];
