<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Contoh sederhana: Periksa apakah pengguna memiliki peran 'admin'
        if (Auth::check() && Auth::user()->role == 'admin') { //Ganti kolom 'role' dengan yang sesuai di model User anda
            return $next($request);
        }

        // Jika tidak memiliki izin, redirect ke halaman lain atau tampilkan error
        return redirect('/home')->with('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.'); //Ganti /home dengan route yang sesuai
    }
}