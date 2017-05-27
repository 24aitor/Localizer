<?php

namespace Aitor24\Localizer\Middlewares;

use Aitor24\Localizer\Facades\LocalizerFacade as Localizer;
use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Unicodeveloper\Identify\Facades\IdentityFacade as Identify;

class LocalizerMiddleware
{
    /**
     * This function checks if language to set is an allowed lang of config.
     *
     * @param string $lang
     **/
    private function setIfAllowed($lang)
    {
        $allowedLangs = array_keys(Localizer::allowedLanguages());
        if (config('localizer.block_unallowed_langs') && !in_array($lang, $allowedLangs)) {
            $lang = $allowedLangs[0];
        }

        App::setLocale($lang);
        if (config('localizer.carbon')) {
            Carbon::setLocale($lang);
        }
    }

    /**
     * This function checks if user is logged in, and loads the prefered language.
     *
     * @param string $lang
     **/
    public function setLang($request)
    {
        if (Auth::check()) {
            $user = Auth::user();

            // Set user locale
            if ($user->locale) {
                $this->setIfAllowed($user->locale);
            } else {
                if (config('localizer.set_auto_lang')) {
                    $this->setIfAllowed(Identify::lang()->getLanguage());
                } else {
                    $this->setIfAllowed(config('localizer.default_lang'));
                }
            }
        } else {
            if ($request->session()->has('locale')) {
                $this->setIfAllowed(session('locale'));
            } else {
                if (config('localizer.set_auto_lang')) {
                    $this->setIfAllowed(Identify::lang()->getLanguage());
                } else {
                    $this->setIfAllowed(config('localizer.default_lang'));
                }
            }
        }
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $this->setLang($request);

        return $next($request);
    }
}
