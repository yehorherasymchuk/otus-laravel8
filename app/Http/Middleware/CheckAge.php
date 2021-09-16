<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAge
{

    use WithUser;

    const MIN_AGE_ADULT = 18;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, int $minAge = self::MIN_AGE_ADULT)
    {
        $user = $this->getUser($request);
        if ($user->age < $minAge){
            abort(403);
        }

        return $next($request);
    }
}
