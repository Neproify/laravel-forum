<?php

namespace App\Http\Middleware;
use Auth;

use Closure;

class LastActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        if(Auth::check())
        {
            $user = Auth::user();
            $user->last_active = date('Y-m-d H:i:s', time());
            $user->save();
        }

        return $response;
    }
}
