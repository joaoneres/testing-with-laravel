<?php

namespace App\Repositories;

use App\Interfaces\AddressRepositoryInterface;
use App\Interfaces\CepServiceInterface;
use App\Models\Address;

class AddressRepository implements AddressRepositoryInterface
{
    protected $cep_service;

    public function __construct(CepServiceInterface $cep_service)
    {
        $this->cep_service = $cep_service;
    }

    public function store($cep, $address_number)
    {
        $cep_data = $this->cep_service->cep($cep);

        return new Address([
            'street' => $cep_data['logradouro'],
            'cep' => $cep,
            'number' => $address_number,
        ]);
    }
}
