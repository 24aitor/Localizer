<?php

namespace Aitor24\Localizer\Middlewares;

use App;
use Auth;
use Closure;
use Unicodeveloper\Identify\Facades\IdentityFacade as Identify;

class LocalizerMiddleware
{
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
                App::setLocale($user->locale);
            } else {
                if (config('localizer.default.set_auto_lang')) {
                    App::setLocale(Identify::lang()->getLanguage());
                } else {
                    App::setLocale(config('localizer.default.default_lang'));
                }
            }
        } else {
            if ($request->session()->has('locale')) {
                App::setLocale(session('locale'));
            } else {
                if (config('localizer.default.set_auto_lang')) {
                    App::setLocale(Identify::lang()->getLanguage());
                } else {
                    App::setLocale(config('localizer.default.default_lang'));
                }
            }
        }

        return $next($request);
    }
}
