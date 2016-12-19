<?php

namespace Aitor24\Localizer\Controllers;

use Aitor24\Localizer\Facades\LocalizerFacade as Localizer;
use Aitor24\Linker\Facades\Linker as Linker;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class LocalizerController extends Controller
{
    private function checkLocale($locale)
    {
        if (!in_array($locale, array_keys(Localizer::allowedLanguages()))) {
            abort(404, "Lang '".$locale."' not found");
        }
    }

    private function setLocale($locale, $request)
    {
        $this->checkLocale($locale);
        if (Auth::check()) {
            $user = Auth::User();
            $user->locale = $locale;
            $user->save();
        } else {
            $request->session()->put('locale', $locale);
        }
    }

    public function set($locale, Request $request)
    {
        $this->setLocale($locale, $request);

        return redirect(LK::url('/'));
    }

    public function setHere($locale, Request $request)
    {
        $this->setLocale($locale, $request);

        return redirect()->back();
    }

    public function view()
    {
        return view('localizer::localizer');
    }
}
