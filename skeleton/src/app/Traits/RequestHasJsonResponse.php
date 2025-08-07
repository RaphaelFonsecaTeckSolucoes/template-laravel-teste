<?php

namespace App\Traits;

use App\Exceptions\FormValidationException;

trait RequestHasJsonResponse
{
    /**
     * return json response if validation fails
     */
    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new FormValidationException($validator);
    }
}
