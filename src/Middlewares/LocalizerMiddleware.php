<?php

namespace Aitor24\Localizer\Middlewares;

use Aitor24\Localizer\Facades\LocalizerFacade as Localizer;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Closure;
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
        if (in_array($lang, $allowedLangs)) {
            App::setLocale($lang);
        } else {
            App::setLocale('en');
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

        return $next($request);
    }
}
