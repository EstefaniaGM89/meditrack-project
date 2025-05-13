<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SanitariAuth
{
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('sanitari_id')) {
            return redirect()->route('login');
        }

        return $next($request);
    }
}
