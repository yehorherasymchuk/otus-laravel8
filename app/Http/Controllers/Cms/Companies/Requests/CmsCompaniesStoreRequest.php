<?php
/**
 * Description of CmsCompaniesStoreRequest.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Egor Gerasimchuk <egor@mister.am>
 */

namespace App\Http\Controllers\Cms\Companies\Requests;


use App\Http\Requests\FormRequest;
use App\Services\Companies\DTO\CreateCompanyDTO;

class CmsCompaniesStoreRequest extends FormRequest
{

    public function rules()
    {
        return [
            'city_id' => 'required',
            'status' => 'required|numeric',
            'name' => 'required|max:255',
            'url' => 'required|max:255',
            'description' => 'nullable|max:1000',
        ];
    }

    public function generateCreateCompanyDTO(): CreateCompanyDTO
    {
        return CreateCompanyDTO::fromArray($this->validated());
    }

}
