<?php

namespace Aitor24\Localizer;

use Aitor24\Laralang\Facades\Laralang as Laralang;
use Aitor24\Localizer\Facades\LocalizerFacade as Localizer;
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
            return Localizer::addNames(config('localizer.allowed_langs'));
        }
    }

    /**
     *
     *
     *
     */
    public static function addNames($langs)
    {
        // Read JSON file
        $json = file_get_contents(__DIR__.'/languages.json');

        //Decode JSON
        $json_data = json_decode($json,true);

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

    public static function recognisedLanguage($lang)
    {
        $json = file_get_contents(__DIR__.'/languages.json');

        //Decode JSON
        $json_data = json_decode($json,true);
        foreach ($json_data as $lang_data) {
            if ($lang_data['code'] == $lang) {
                return true;
            }
        }
        return false;
    }

    public static function check_asset($asset)
    {
        if (config('localizer.https')) {
            return secure_asset($asset);
        }
        return asset($asset);
    }

    public static function check_url($url)
    {
        if (config('localizer.https')) {
            return secure_asset($asset);
        }
        return asset($asset);
    }

    // Return html code to instert flag
    public static function getHtmlFlag($code, $size = '15px')
    {
        $flag = $code;
        $array = ['en' => 'gb','zh' => 'cn', 'ja' => 'jp', 'ca' => 'img', 'eu' => 'img'];
        if (array_key_exists($code, $array)) {
            $flag = $array[$code];
        }
        if($flag == 'img'){
            return "<img src=".Localizer::check_asset('vendor/aitor24/Localizer/Flags/'.$code.'.jpg')." style='height:".$size.";' />";
        }
        return '<span class="flag-icon flag-icon-'.$flag.'" style="font-size:'.$size.';" ></span>';
    }

    public static function setRoute($code)
    {
        return route('localizer::setLocale',['locale' => $code ]);
    }

    public static function getCurrentHtmlFlag()
    {
        return Localizer::getHtmlFlag(App::getLocale());
    }

    public static function getCurrentCode($ucfirst = false)
    {
        if ($ucfirst) {
            return ucfirst(App::getLocale());
        }
        return App::getLocale();
    }

    public static function getCurrentLanguage()
    {
        return Localizer::addNames([Localizer::getCurrentCode()])[Localizer::getCurrentCode()];
    }
}
