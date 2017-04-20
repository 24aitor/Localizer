<?php

namespace Aitor24\Localizer;

use Illuminate\Support\Facades\App;

class Builder
{
    /**
     * Get all allowed languages.
     *
     * @return array
     */
    public static function allowedLanguages()
    {
        if (config('localizer.allowed_langs')) {
            return self::addNames(config('localizer.allowed_langs'));
        } else {
            return self::addNames([config('localizer.default_lang')]);
        }
    }

    /**
     * Returns add names for arrays with only codes an return an array as [$code => $language].
     *
     * @param array $langs
     *
     * @return array
     */
    public static function addNames($langs)
    {
        // Read JSON file
        $json = file_get_contents(__DIR__.'/languages.json');

        //Decode JSON
        $json_data = json_decode($json, true);

        $array = [];

        //Generate an array with $lang code as key and name as value
        foreach ($langs as $lang) {
            $lang_name = 'Unknoun';
            foreach ($json_data as $lang_data) {
                if ($lang_data['code'] == $lang) {
                    $lang_name = $lang_data['name'];
                }
            }
            $array[$lang] = $lang_name;
        }

        return $array;
    }

    /**
     * Returns an string url to set up language.
     *
     * @param string $code
     *
     * @return string
     */
    public static function setRoute($code)
    {
        return route('localizer::setLocale', ['locale' => $code]);
    }

    /**
     * Returns  the current language code.
     *
     * @param string $ucfirst
     *
     * @return string
     */
    public static function getCurrentCode($ucfirst = false)
    {
        if ($ucfirst) {
            return ucfirst(App::getLocale());
        }

        return App::getLocale();
    }

    /**
     * Returns  the current language name.
     *
     * @return string
     */
    public static function getCurrentLanguage()
    {
        return self::addNames([self::getCurrentCode()])[self::getCurrentCode()];
    }

    /**
     * Returns the language name.
     *
     * @param string $code
     *
     * @return string
     */
    public static function getLanguage($code)
    {
        return self::addNames([$code])[$code];
    }
}
