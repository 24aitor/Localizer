<?php

namespace Aitor24\Localizer\Middlewares;

use App;
use Auth;
use Closure;
use Unicodeveloper\Identify\Facades\IdentifyFacade as Identify;

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
                }
            }
        } else {
            if ($request->session()->has('locale')) {
                App::setLocale(session('locale'));
            } else {
                if (config('localizer.default.set_auto_lang')) {
                    App::setLocale(Identify::lang()->getLanguage());
                }
            }
        }

        return $next($request);
    }
}
