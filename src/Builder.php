<?php

namespace Aitor24\Localizer;

use Illuminate\Support\Facades\App;

class Builder
{
    /**
     * Get all allowed languages.
     *
     * @return array
     **/
    public static function allowedLanguages()
    {
        if (config('localizer.allowed_langs')) {
            return self::addNames(config('localizer.allowed_langs'));
        } else {
            return self::addNames([config('localizer.default_lang')]);
        }
    }

    /**
     * Add names to an array of language codes as [$code => $language].
     *
     * @param array $codes
     *
     * @return array
     **/
    public static function addNames($codes)
    {
        // Read and decode JSON
        $json_data = json_decode(file_get_contents(__DIR__.'/languages.json'), true);

        $array = [];

        // Generate an array with $code as key and $code language as value
        foreach ($codes as $code) {
            $lang_name = 'Unknoun';
            foreach ($json_data as $lang_data) {
                if ($lang_data['code'] == $code) {
                    $lang_name = $lang_data['name'];
                }
            }
            $array[$code] = $lang_name;
        }

        return $array;
    }

    /**
     * Add names to an array of language codes as [$language => $code].
     *
     * @param array $langs
     *
     * @return array
     **/
    public static function addCodes($langs)
    {
        // Read and decode JSON
        $json_data = json_decode(file_get_contents(__DIR__.'/languages.json'), true);

        $array = [];

        // Generate an array with $lang as key and $lang code as value
        foreach ($langs as $lang) {
            $code = 'unk';
            foreach ($json_data as $lang_data) {
                if ($lang_data['name'] == $lang) {
                    $code = $lang_data['code'];
                }
            }
            $array[$lang] = $code;
        }

        return $array;
    }

    /**
     * Returns the url to set up language and return back.
     *
     * @param string $code
     *
     * @return string
     **/
    public static function setRoute($code)
    {
        return route('localizer::setLocale', ['locale' => $code]);
    }

    /**
     * Returns the url to set up language and return to url('/').
     *
     * @param string $code
     *
     * @return string
     **/
    public static function setRouteHome($code)
    {
        return route('localizer::setLocaleHome', ['locale' => $code]);
    }

    /**
     * Returns the current language code.
     *
     * @return string
     **/
    public static function getCode($name = self::getLanguage())
    {
        return self::addCodes([$name])[$name];
    }

    /**
     * Returns the language name.
     *
     * @return string
     **/
    public static function getLanguage($code = App::getLocale())
    {
        return self::addNames([$code])[$code];
    }
}
