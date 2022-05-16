<?php

namespace App\Exceptions;

use Exception;

class CepErrorException extends Exception
{
    public function render($request)
    {
        return response()->view('address.cep-error');
    }
}
