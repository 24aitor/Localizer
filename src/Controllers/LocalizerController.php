<?php

namespace Aitor24\Localizer\Controllers;

use Aitor24\Localizer\Facades\LocalizerFacade as Localizer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LocalizerController extends Controller
{
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

    public function setHome($locale, Request $request)
    {
        $this->setLocale($locale, $request);

        return redirect(url('/'));
    }

    public function set($locale, Request $request)
    {
        $this->setLocale($locale, $request);

        return redirect()->back();
    }

    public function view()
    {
        return view('localizer::localizer');
    }
}
