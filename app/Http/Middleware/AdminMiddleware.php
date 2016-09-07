<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Redirect;

class AdminMiddleware
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
        if(Auth::check() == false or Auth::user()->isAdmin() == false)
        {
            return Redirect::to('/');
        }
        return $next($request);
    }
}
