<?php

namespace App\Http\Middleware;

use Closure;

class FichajeMiddleware
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
        if($request->user()->type === 'medico')
            return redirect('hclinica/');
        return $next($request);
    }
}
