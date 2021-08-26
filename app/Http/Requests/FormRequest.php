<?php
/**
 * Description of FormRequest.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Egor Gerasimchuk <egor@mister.am>
 */

namespace App\Http\Requests;

use Illuminate\Support\Arr;
use Illuminate\Foundation\Http\FormRequest as BaseFormRequest;

class FormRequest extends BaseFormRequest
{


    public function getFormData(): array
    {
        $data = $this->request->all();

        return Arr::except($data, [
            '_token',
            '_method',
        ]);
    }

}
