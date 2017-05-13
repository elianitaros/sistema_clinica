<?php

namespace App\Http\Middleware;

use Closure;

class MedicoMiddleware
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
        if($request->user()->type === 'admin')
            return redirect('admin/');
        elseif($request->user()->type === 'fichaje')
            return redirect('fichaje/');
        return $next($request);
    }
}
