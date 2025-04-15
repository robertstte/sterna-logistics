<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController
{
    public function setLanguage($lang)
    {
        if (in_array($lang, ['es', 'en'])) {
            App::setlocale($lang);
            Session::put('language', $lang);
        }
        return back();
    }
}
