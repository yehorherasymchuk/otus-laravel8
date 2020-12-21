<?php

namespace App\Http\Middleware;

use App\Models\User;
use App\Services\Users\UsersService;
use Closure;
use Illuminate\Http\Request;

class RestrictNonAdultUsers
{

    private UsersService $usersService;

    public function __construct(
        UsersService $usersService
    )
    {
        $this->usersService = $usersService;
    }

    public function handle(Request $request, Closure $next)
    {
        /** @var User $user */
        $user = $request->user();
        if (!$this->usersService->isUserAdult($user)) {
            abort(403);
        }

        return $next($request);
    }
}
