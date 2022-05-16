<?php

namespace App\Interfaces;

interface AddressRepositoryInterface
{
    public function store(String $cep, String $address_number);
}
