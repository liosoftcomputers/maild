<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkApiKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {   
        // $app_key = $request->header()['app_key'][0];

        // if () {
        //     # code...
        // }

        return $next($request);
    }
}
