<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CekLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = \App\Models\User::where('username', $request->username)->first();
        if ($user->level == '0') {
            return response()->view('dashboard/coba');
        } elseif ($user->level == '1') {
            return response()->view('dashboard/coba');
        }
        else
        {
            return response()->view('auth.login');
        }
        
        return $next($request);
    }
}
