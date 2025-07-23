<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserHasRole
{
    public function handle(Request $request, Closure $next): Response
    {
        // Izinkan akses halaman login dan logout
        if ($request->is('admin/login') || $request->is('admin/logout')) {
            return $next($request);
        }

        // Kalau belum login, redirect ke login
        if (! auth()->check()) {
            return redirect()->route('filament.admin.auth.login');
        }

        // Hanya izinkan role admin atau dokter
        if (! auth()->user()->hasAnyRole(['admin', 'dokter'])) {
            abort(403, 'ANDA TIDAK MEMILIKI AKSES.');
        }

        return $next($request);
    }
}
