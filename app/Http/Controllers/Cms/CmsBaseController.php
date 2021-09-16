<?php
/**
 * Description of CmsController.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Egor Gerasimchuk <egor@mister.am>
 */

namespace App\Http\Controllers\Cms;


use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;

class CmsBaseController extends Controller
{

    const DEFAULT_MODELS_PER_PAGE = 50;

    protected function getCurrentUser(): User
    {
        $user = Auth::user();
        if (! $user) {
            abort(401);
        }
        return $user;
    }

}
