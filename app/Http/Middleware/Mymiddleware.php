<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Mymiddleware extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function handle($request, Closure $next)
    {
       if($request->has('diem') && $request['diem'] >= 5)
            return $next($request);
        else
        return redirect()->route('loi');
    }
}
