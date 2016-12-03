<?php

namespace Aitor24\Localizer\Controllers;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class LocalizerController extends Controller
{
    private function setLocale($locale, $request)
    {
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

        return redirect('/');
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
