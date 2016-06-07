<?php

namespace FCLLA\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Administration
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
        if(!Auth::user()->admin == 0) {
            flash()->error('You are not authorized.');
            return redirect()->back();
        }

        return $next($request);
    }
}
