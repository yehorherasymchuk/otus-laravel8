<?php
/**
 * Description of StoreContinentFormRequest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace App\Http\Controllers\Cms\Continents\Requests;


use App\Http\Requests\FormRequest;

abstract class ContinentFormRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'min:4',
                'max:20',
            ],
        ];
    }

}
