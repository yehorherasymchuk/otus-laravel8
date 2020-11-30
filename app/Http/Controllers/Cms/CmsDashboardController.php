<?php
/**
 * Description of CmsDashboardController.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Egor Gerasimchuk <egor@mister.am>
 */

namespace App\Http\Controllers\Cms;


use App\Policies\Gates;
use Gate;

class CmsDashboardController
{

    public function index()
    {
        Gate::authorize(Gates::CMS_VIEW_DASHBOARD);

        return view('cms.dashboard');
    }

}
