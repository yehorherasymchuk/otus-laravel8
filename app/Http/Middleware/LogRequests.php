<?php

namespace App\Http\Middleware;

use Closure;
use Composer\Util\Http\Response;
use Illuminate\Http\Request;

class LogRequests
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
        return $next($request);
    }


    public function terminate(Request $request, Response $response): void
    {

    }
}
