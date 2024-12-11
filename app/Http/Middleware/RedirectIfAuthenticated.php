<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        // Jika pengguna sudah login, arahkan ke halaman terakhir mereka
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // Simpan URL sebelumnya sebelum login
                if ($request->routeIs('login.form')) {
                    return redirect()->intended();
                }

                // Arahkan ke halaman terakhir jika sudah login
                return redirect()->intended($request->session()->get('url.intended', '/'));
            }
        }

        return $next($request);
    }
}
