<?php

namespace App\Services;

use App\Exceptions\CepErrorException;
use App\Interfaces\CepServiceInterface;
use App\Interfaces\HttpClientInterface;

class CepService implements CepServiceInterface
{
    protected String $base_url = 'https://viacep.com.br/ws/';
    protected $http_client_service;

    public function __construct(HttpClientInterface $http_client_service)
    {
        $this->http_client_service = $http_client_service;
    }

    public function cep(String $cep)
    {
        $response = $this->http_client_service->get($this->base_url.$cep.'/json');

        if(!array_key_exists('erro', $response)) {
            return $response;
        }

        throw new CepErrorException();
    }
}
