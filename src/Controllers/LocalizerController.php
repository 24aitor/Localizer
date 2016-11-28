<?php

namespace Aitor24\Localizer\Controllers;

use Auth;
use URL;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LocalizerController extends Controller
{
    public function set($locale, Request $request)
    {
    	if (Auth::check()){
            $user = Auth::User();
            $user->locale = $locale;
            $user->save();
    	} else {
            $request->session()->put('locale', $locale);
    	}
        return redirect(URL::previous());
    }
}
