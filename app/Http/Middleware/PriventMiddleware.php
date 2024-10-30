<?php

namespace App\Http\Middleware;

use App\Http\Services\Email\SendIPChange;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class PriventMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = User::find(Auth::id());

            if ($request->ip() != $user->ip_address) {
                try {
                    SendIPChange::handle($user->id);

                    return redirect()->route('user.auth.sign-in.show')->with('error', 'perangkat anda tidak terdaftar, silahkan check email');
                } catch (\Throwable $th) {
                    Log::error($th->getMessage());
                    abort(500, 'Server error');
                }
            }

            return $next($request);
        }

        abort(403, 'Unauthorized');
    }
}
