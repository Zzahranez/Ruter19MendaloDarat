<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->role == 'admin') {
            return $next($request);
        }
    
        // Arahkan kembali hanya jika pengguna tidak admin
        return redirect('/')->with('error', 'Anda tidak memiliki akses ke halaman admin.');
    
    }
}
