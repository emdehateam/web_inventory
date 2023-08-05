<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isLogin
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
        
        if(Auth::check()){
            return $next($request);
        }
            // return $next($request);
        return redirect('login');

        // if(Auth::check()){
        //     if (Auth::user()->role == 1) {
        //         return redirect('dashboard')->with('success', 'Anda sudah login sebagai Superadmin');
        //     }
        //     if (Auth::user()->role == 2) {
        //         return redirect('dashboard')->with('success', 'Anda sudah login sebagai Admin');
        //     }
        //     if (Auth::user()->role == 3) {
        //         return redirect('dashboard')->with('success', 'Anda sudah login sebagai Pegawai');
        //     }
        // }
        // // return $next($request);
        // return $next($request);

        // return $next($request);
    }
}
