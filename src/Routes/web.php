<?php

if (config('localizer.default.routes')) {
    Route::group(['middleware' => ['web', 'localizer.middleware'], 'as' => 'localizer::', 'prefix' => config('localizer.default.prefix'), 'namespace' => 'Aitor24\Localizer\Controllers'], function () {
        Route::get('/set/{locale}/', 'LocalizerController@set')->name('setLocale');
        Route::get('/set/here/{locale}/', 'LocalizerController@setHere')->name('setLocaleHere');
        if (config('localizer.default.select_lang_routes')) {
            Route::get('/', 'LocalizerController@view')->name('localizer');
        }
    });
}
