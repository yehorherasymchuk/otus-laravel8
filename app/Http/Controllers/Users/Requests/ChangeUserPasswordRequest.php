<?php
/**
 * Description of ChangeUserPasswordRequest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace App\Http\Controllers\Users\Requests;


use App\Http\Requests\FormRequest;

class ChangeUserPasswordRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'password' => 'required|password',
            'confirm_password' => 'required|password',
        ];
    }

}
