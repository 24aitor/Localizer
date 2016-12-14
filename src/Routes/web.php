<?php

if (config('localizer.routes')) {
    Route::group(['middleware' => ['web', 'localizer'], 'as' => 'localizer::', 'prefix' => config('localizer.prefix'), 'namespace' => 'Aitor24\Localizer\Controllers'], function () {
        Route::get('/set/{locale}/', 'LocalizerController@set')->name('setLocale');
        Route::get('/set/here/{locale}/', 'LocalizerController@setHere')->name('setLocaleHere');
        if (config('localizer.select_lang_routes')) {
            Route::get('/', 'LocalizerController@view')->name('localizer');
        }
    });
}
