<?php
/**
 * Description of UpdateUserPasswordController.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace App\Http\Controllers\Users;


use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\Users\UsersService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UpdateUserPasswordController extends Controller
{

    private function getUsersService(): UsersService
    {
        return app(UsersService::class);
    }

    public function __invoke(Request $request, User $user): JsonResponse
    {
        $this->getUsersService()->changeUserPassword(
            $user,
            $request->get('password'),
        );
        return response()->json($user);
    }

}
