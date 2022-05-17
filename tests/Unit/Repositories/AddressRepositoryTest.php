<?php

namespace Tests\Unit\Repositories;

use App\Exceptions\CepErrorException;
use App\Repositories\AddressRepository;
use App\Services\CepService;
use PHPUnit\Framework\TestCase;

class AddressRepositoryTest extends TestCase
{
    public function testShouldPassWithValidCepStringAndCorrectAddressNumber()
    {
        $cep_service_mock = $this->createMock(CepService::class);
        $address_repository = new AddressRepository($cep_service_mock);
        $cep = '6591040';
        $address_number = '160';

        $cep_service_mock->expects($this->once())->method('cep')->will($this->returnValue([
            'logradouro' => 'R JOAO LISBOA'
        ]));

        $address_repository->store($cep, $address_number);
    }
}
