<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; 

class CheckAuth
{
    public function handle(Request $request, Closure $next)
    {
        if (!$request->session()->has('user_id')) {
            return redirect()->route('login')->withErrors(['message' => 'Silakan login terlebih dahulu.']);
        }
    
        return $next($request);
    }
}
