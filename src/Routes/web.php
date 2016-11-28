<?php

if (config('localizer.default.routes')) {
    Route::group(['middleware' => 'web', 'as' => 'localizer::', 'prefix' => config('localizer.default.prefix'), 'namespace' => 'Aitor24\Localizer\Controllers'], function () {
        Route::get('/set/{locale}', 'LocalizerController@set')->name('localeSet');
        });
}
