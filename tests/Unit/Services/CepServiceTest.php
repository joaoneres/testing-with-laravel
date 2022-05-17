<?php

namespace Tests\Unit\Services;

use App\Exceptions\CepErrorException;
use App\Interfaces\HttpClientInterface;
use App\Services\CepService;
use PHPUnit\Framework\TestCase;

class CepServiceTest extends TestCase
{
    public function testShouldGetCepErrorExceptionWhenInvalidCepString()
    {
        $http_client_service_mock = $this->createMock(HttpClientInterface::class);
        $cep_service = new CepService($http_client_service_mock);
        $cep = '00000000';
        $http_client_service_mock->expects($this->once())->method('get')->will($this->returnValue(['erro' => 'true']));
        $this->expectException(CepErrorException::class);
        $cep_service->cep($cep);
    }

    public function testShouldGetResponseWhenValidCepString()
    {
        $http_client_service_mock = $this->createMock(HttpClientInterface::class);
        $cep_service = new CepService($http_client_service_mock);
        $cep = '65910020';

        $http_client_service_mock->expects($this->once())->method('get')->will($this->returnValue([
            'logradouro' => 'R JOAO LISBOA',
        ]));

        $result = $cep_service->cep($cep);

        $this->assertEquals([
            'logradouro' => 'R JOAO LISBOA',
        ], $result);
    }
}
