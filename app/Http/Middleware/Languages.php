<?php

namespace App\Http\Middleware;

use Closure;

class Languages
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
        if($language=$request->session()->get('language-web')){
            \App::setLocale($language);
        }

        return $next($request);
    }
}