<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isGuest
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
        // if(Auth::check()){
        //     return redirect('dashboard');
        // }
        //     // return $next($request);
        //     return $next($request);

        if(Auth::check()){
            if (Auth::user()->role == 1) {
                return redirect('dashboard')->with('success', 'Anda sudah login sebagai Superadmin');
            }
            if (Auth::user()->role == 2) {
                return redirect('administrator')->with('success', 'Anda sudah login sebagai Admin');
            }
            if (Auth::user()->role == 3) {
                return redirect('administrator')->with('success', 'Anda sudah login sebagai Pegawai');
            }
        }
        // return $next($request);
        return $next($request);
                
        // return $next($request);
    }
}
