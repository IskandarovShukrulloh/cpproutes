<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Enums\UserRole;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // не авторизован → на логин
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        // не админ → 403
        if (auth()->user()->role !== UserRole::ADMIN) {
            abort(403);
        }

        return $next($request);
    }
}
