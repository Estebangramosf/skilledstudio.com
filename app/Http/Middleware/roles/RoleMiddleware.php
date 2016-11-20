<?php

namespace App\Http\Middleware\roles;

use Closure;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class RoleMiddleware
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
        Session::flash('message-error','Restringido.');
        return Redirect::to('/roles');
        //return $next($request);
    }
}
