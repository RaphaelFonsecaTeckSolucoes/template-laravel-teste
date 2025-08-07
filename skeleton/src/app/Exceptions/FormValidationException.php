<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;

class FormValidationException extends Exception
{

    public function __construct(protected \Illuminate\Contracts\Validation\Validator $request){}

    /**
     * Report the exception.
     */
    public function report(): void
    {
        //
    }

    /**
     * Render the exception as an HTTP response.
     */
    public function render(Request $request): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'message' => "Informações inválidas.",
            'error' => true,
            'infos' => $this->request->errors()
        ], 422);
    }
}
