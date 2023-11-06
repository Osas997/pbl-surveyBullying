<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SudahLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guard("admin")->check()) {
            return redirect("/admin/dashboard");
        }

        if (auth("sekolah")->check()) {
            return redirect("/sekolah/dashboard");
        }

        if (auth("guru")->check()) {
            return redirect("/guru/dashboard");
        }

        if (auth("murid")->check()) {
            return redirect("/murid/dashboard");
        }

        return $next($request);
    }
}
