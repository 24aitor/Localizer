<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Enable All Localizer Routes
    |--------------------------------------------------------------------------
    |
    | This option enable localizer routes.
    |
    */
    'routes'        => true,

    /*
    |--------------------------------------------------------------------------
    | Enable Localizer Home Route
    |--------------------------------------------------------------------------
    |
    | This option enable localizer route to set language and return
    | to url('/')
    |
    */
    'homeRoute'     => true,


    /*
    |--------------------------------------------------------------------------
    | Carbon Language
    |--------------------------------------------------------------------------
    |
    | This option sets carbon language.
    |
    */
    'carbon'        => true,

    /*
    |--------------------------------------------------------------------------
    | Auto Change Language
    |--------------------------------------------------------------------------
    |
    | This option allows to change website language to user's
    | browser language.
    |
    */
    'set_auto_lang' => true,

    /*
    |--------------------------------------------------------------------------
    | Default Language
    |--------------------------------------------------------------------------
    |
    | This option indicates the default language.
    |
    */
    'default_lang'  => 'en',

    /*
    |--------------------------------------------------------------------------
    | Routes Prefix
    |--------------------------------------------------------------------------
    |
    | This option indicates the prefix for localizer routes.
    |
    */
    'prefix'        => 'lang',

    /*
    |--------------------------------------------------------------------------
    | Middleware
    |--------------------------------------------------------------------------
    |
    | This option indicates the middleware to change language.
    |
    */
    'middleware'    => Aitor24\Localizer\Middlewares\LocalizerMiddleware::class,


    /*
    |--------------------------------------------------------------------------
    | Allowed languages
    |--------------------------------------------------------------------------
    |
    | This options indicates the localizer allowed languages and if
    | users can set unallowed languages on localizer middleware.
    |
    */

    'block_unallowed' => false

    'allowed_langs' => ['en', 'ca', 'es', 'fr', 'de', 'it'],
];
