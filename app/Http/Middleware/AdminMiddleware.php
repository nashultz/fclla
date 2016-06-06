<?php

namespace FCLLA\Http\Middleware;

use Closure;

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
        if(Auth::user()->admin == 1) {
            flash()->warning('You are not authorized to view this page.');
            return redirect('/');
        }
        return $next($request);
    }
}
