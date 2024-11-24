<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckPreference
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Jika preferensi sudah diatur, redirect ke halaman register
        if (session()->has('preference_set') && session('preference_set') === true) {
            return redirect()->route('register.form');
        }

        return $next($request);
    }
}

