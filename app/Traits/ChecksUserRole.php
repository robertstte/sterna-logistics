<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;

trait ChecksUserRole
{
    protected function checkRole($roleId)
    {
        if (!Auth::check()) {
            return false;
        }

        return Auth::user()->role_id === $roleId;
    }

    protected function redirectBasedOnRole()
    {
        $user = Auth::user();
        if ($user->role_id === 1) {
            return redirect()->route('orders.index');
        }
        return redirect()->route('ordersUser.index');
    }
} 