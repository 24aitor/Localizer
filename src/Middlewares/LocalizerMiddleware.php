<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class LocalizerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();

            // Set user locale
            if($user->locale) {
                App::setLocale($user->locale);
            }

        } else {
            if ($request->session()->has('locale')) {
                	App::setLocale(session('locale'));
                }
        }
        
        return $next($request);
    }
}
