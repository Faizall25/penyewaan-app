<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class EnsureSingleSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $userId = Auth::user()->id;

            // Dapatkan sesi pengguna dari database
            $currentSessionId = Session::getId();
            $lastSessionId = DB::table('sessions')
                ->where('user_id', $userId)
                ->orderBy('last_activity', 'desc')
                ->value('id');

            // Jika sesi terakhir tidak sama dengan sesi saat ini, logout pengguna
            if ($lastSessionId && $lastSessionId !== $currentSessionId) {
                Auth::logout();
                return redirect()->route('user.auth.sign-in.show')->with('error', 'Anda sudah login di perangkat lain, saat ini anda telah logout dan mohon login ulang');
            }
        }

        return $next($request);
    }
}
