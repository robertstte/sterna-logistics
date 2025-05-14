<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $roleId = (int) $role;
        if (Auth::user()->role_id !== $roleId) {
            if ($roleId === 1) {
                return redirect()->route('ordersUser.index');
            } else {
                return redirect()->route('orders.index');
            }
        }

        return $next($request);
    }
}
