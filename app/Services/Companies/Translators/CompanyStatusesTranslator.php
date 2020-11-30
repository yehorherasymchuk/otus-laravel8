<?php
/**
 * Description of CompanyStatusesTranslator.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Egor Gerasimchuk <egor@mister.am>
 */

namespace App\Services\Companies\Translators;


use App\Models\Company;

class CompanyStatusesTranslator
{

    public function translate(string $lang): array
    {
        return [
            Company::STATUS_INACTIVE => __('messages.statuses.inactive', [], $lang),
            Company::STATUS_ACTIVE => __('messages.statuses.active', [], $lang),
        ];
    }

}
