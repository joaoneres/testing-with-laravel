<?php

namespace App\Services;

use App\Exceptions\CepErrorException;
use App\Interfaces\CepServiceInterface;
use Illuminate\Support\Facades\Http;

class CepService implements CepServiceInterface
{
    protected String $base_url = 'https://viacep.com.br/ws/';

    public function cep(String $cep)
    {
        $response = Http::get($this->base_url.$cep.'/json');
        $decoded_response = json_decode($response->body(), true);

        if($response->status() == 200 && !array_key_exists('erro', $decoded_response)) {
            return $decoded_response;
        }

        throw new CepErrorException();
    }
}
