<?php

namespace Aitor24\Localizer\Controllers;

use Aitor24\Localizer\Facades\LocalizerFacade as Localizer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LocalizerController extends Controller
{
    /**
	 *
     * Set locale if it's allowed.
     *
     * @param string $locale
     * @param \Illuminate\Http\Request $request
	 *
     **/
    private function setLocale($locale, $request)
    {
        if (!in_array($locale, array_keys(Localizer::allowedLanguages()))) {
            abort(404, "Lang '".$locale."' not found");
        }
        if (Auth::check()) {
            $user = Auth::User();
            $user->locale = $locale;
            $user->save();
        } else {
            $request->session()->put('locale', $locale);
        }
    }

    /**
	 *
     * Set locale and return home url.
     *
     * @param string $locale
     * @param \Illuminate\Http\Request $request
	 *
     **/
    public function setHome($locale, Request $request)
    {
        $this->setLocale($locale, $request);

        return redirect(url('/'));
    }

    /**
	 *
     * Set locale and return back.
     *
     * @param string $locale
     * @param \Illuminate\Http\Request $request
	 *
     **/
    public function set($locale, Request $request)
    {
        $this->setLocale($locale, $request);

        return redirect()->back();
    }
}
