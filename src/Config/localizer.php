<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default settings for localizer
    |--------------------------------------------------------------------------
    */

    'routes'        => true,
    'carbon'        => true,
    'homeRoute'     => true,
    'set_auto_lang' => true,
    'default_lang'  => 'en', // If set_auto_lang is true has no effect
    'prefix'        => 'lang',
    'allowed_langs' => ['en', 'ca', 'es', 'fr', 'de', 'it'], // If is empty only default_lang will be allowed,
    'middleware'    => Aitor24\Localizer\Middlewares\LocalizerMiddleware::class,
];
