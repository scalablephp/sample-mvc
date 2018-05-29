<?php

namespace App\Http\Middleware;

use Closure;

class CheckLang
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
        if ($request->session()->has('language')) {
            \App::setLocale($request->session()->get('language'));
        }else {
            \App::setLocale(\App::getLocale());
        }
        return $next($request);
    }
}
