<?php

namespace Aitor24\Localizer;

use Aitor24\Laralang\Facades\Laralang as Laralang;
use Aitor24\Linker\Facades\Linker as Linker;
use App;

class Builder
{
    /**
     * Get all allowed languages.
     *
     * @return array
     */
    public static function allowedLanguages()
    {
        if (!config('localizer.allowed_langs')) {
            return Laralang::allLanguages();
        } else {
            return self::addNames(config('localizer.allowed_langs'));
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
     * Returns an html code to insert a flag into website. Must be called with {!! !!} statements.
     *
     * @param string $code
     * @param string $size
     *
     * @return string
     */
    public static function getHtmlFlag($code, $size = '15px')
    {
        $flag = $code;
        $array = ['en' => 'gb', 'zh' => 'cn', 'ja' => 'jp', 'ca' => 'img', 'eu' => 'img'];
        if (array_key_exists($code, $array)) {
            $flag = $array[$code];
        }
        if ($flag == 'img') {
            return '<img src='.Linker::asset('vendor/Aitor24/Localizer/Flags/'.$code.'.jpg')." style='height:".$size.";' />";
        }

        return '<span class="flag-icon flag-icon-'.$flag.'" style="font-size:'.$size.';" ></span>';
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
        return Linker::route('localizer::setLocale', ['locale' => $code]);
    }

    /**
     * Returns an html code to insert the current language flag into website. Must be called with {!! !!} statements.
     *
     * @param string $size
     *
     * @return string
     */
    public static function getCurrentHtmlFlag($size = '15px')
    {
        return self::getHtmlFlag(App::getLocale(), $size);
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
     * @param string $ucfirst
     *
     * @return string
     */
    public static function getCurrentLanguage()
    {
        return self::addNames([self::getCurrentCode()])[self::getCurrentCode()];
    }
}
