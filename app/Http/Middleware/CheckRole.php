<?php

namespace App\Http\Middleware;

use Closure;


class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,...$roles)
    {
        if(in_array ($request->user()->level == 1 || $request->user()->level == 0 ,$roles)){
        return $next($request);
        }
        return redirect ('/');

    }
}
