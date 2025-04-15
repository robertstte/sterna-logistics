<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class LanguageMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $language = Session::get('language') ?? 'en';
        Session::put('language', $language);
        App::setlocale($language);
        return $next($request);
    }
}
