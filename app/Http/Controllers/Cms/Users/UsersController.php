<?php
/**
 * Description of UsersController.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Egor Gerasimchuk <egor@mister.am>
 */

namespace App\Http\Controllers\Cms\Users;


use App\Http\Controllers\Cms\CmsBaseController;
use Auth;
use Illuminate\Http\Request;

class UsersController extends CmsBaseController
{

    public function sudo(Request $request)
    {
        $user_id = $request->get('id');



        Auth::loginUsingId($user_id);
    }

}
