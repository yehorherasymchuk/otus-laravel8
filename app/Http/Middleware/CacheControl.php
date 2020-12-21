<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CacheControl
{

    public function handle(Request $request, Closure $next, int $ttl = 60)
    {
        /** @var Response $response */
        $response = $next($request);

        $response->setCache([
            'Max-Age' => $ttl,
            'Cache-Control' => 'public',
        ]);

        return $response;
    }

    
}
