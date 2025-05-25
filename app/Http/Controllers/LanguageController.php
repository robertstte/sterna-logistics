<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController
{
    public function setLanguage($lang, Request $request)
    {
        if (in_array($lang, ['es', 'en'])) {
            App::setlocale($lang);
            Session::put('language', $lang);
        }
        
        // Obtener la URL de referencia
        $previousUrl = url()->previous();
        $parsedUrl = parse_url($previousUrl);
        
        // Si estamos en la página de solicitudes, redirigir específicamente a esa ruta
        if (strpos($parsedUrl['path'], '/user/orders') !== false) {
            return redirect()->route('user.orders');
        } elseif (strpos($parsedUrl['path'], '/admin/orderRequests') !== false) {
            return redirect()->route('admin.orderRequests');
        }
        
        // Para otras páginas, usar la redirección estándar
        return back();
    }
}
