<?php

namespace App\Http\Middleware\Cms;

use App;
use Closure;
use Illuminate\Http\Request;
use View;

class ShareViewCommonData
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
        View::share([
            'time' => time(),
            'user' => $request->user(),
            'locale' => App::getLocale(),
            'supportPhone' => config('app.support.phone'),
        ]);

        return $next($request);
    }
}
