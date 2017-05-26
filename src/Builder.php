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
            return self::addNames(array_merge(config('localizer.allowed_langs'), [config('localizer.default_lang')]));
        } else {
            return self::addNames([config('localizer.default_lang')]);
        }
    }

    /**
     * Return true if $code is an allowed lang.
     *
     * @return bool
     **/
    public static function isAllowedLanguage($code)
    {
        return in_array($code, array_keys(self::allowedLanguages()));
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
        // Get languages from config
        $languages = config('localizer.languages');

        $array = [];

        // Generate an array with $code as key and $code language as value
        foreach ($codes as $code) {
            $lang_name = 'Unknown';

            foreach ($languages as $language) {
                if ($language['code'] == $code) {
                    $lang_name = $language['name'];
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
        // Get languages from config
        $languages = config('localizer.languages');

        $array = [];

        // Generate an array with $lang as key and $lang code as value
        foreach ($langs as $lang) {
            $lang_code = 'unk';

            foreach ($languages as $language) {
                if ($language['name'] == $lang) {
                    $lang_code = $language['code'];
                }
            }

            $array[$lang] = $lang_code;
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
    public static function getCode($name = 'default')
    {
        if ($name == 'default') {
            $name = self::getLanguage();
        }

        return self::addCodes([$name])[$name];
    }

    /**
     * Returns the language name.
     *
     * @return string
     **/
    public static function getLanguage($code = 'default')
    {
        if ($code == 'default') {
            $code = App::getLocale();
        }

        return self::addNames([$code])[$code];
    }
}
