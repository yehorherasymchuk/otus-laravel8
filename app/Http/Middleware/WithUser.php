<?php
/**
 * Description of WithUser.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace App\Http\Middleware;


use App\Models\User;
use Illuminate\Http\Request;

trait WithUser
{

    protected function getUser(
        Request $request
    ): User {
        $user = $request->user();
        if (!$user) {
            abort(401);
        }
        return $user;
    }
}
