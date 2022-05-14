<?php

namespace Tests\Unit\Services;

use App\Interfaces\LoggerInterface;
use App\Repositories\TemperatureMeasurementRepository;
use App\Services\TemperatureMeasurementService;
use PHPUnit\Framework\TestCase;

class TemperatureMeasurementServiceTest extends TestCase
{
    public function testShouldSaveWhenTemperatureIsEqualOrGreaterThan150Degrees()
    {
        $temperature_measurement_repository_mock = $this->createMock(TemperatureMeasurementRepository::class);
        $logger_interface_mock = $this->createMock(LoggerInterface::class);
        $temperature_measurement_service = new TemperatureMeasurementService($temperature_measurement_repository_mock, $logger_interface_mock);

        $temperature_measurement_repository_mock->expects($this->once())->method('save');

        $messages = [];

        $logger_interface_mock->method('log')->will($this->returnCallback(function($message) use(&$messages) {
            $messages[] = $message;
        }));

        $temperature_measurement_service->save([
            'temperature' => 1520,
        ]);

        $this->assertEquals([
            'Iniciando processo de salvamento',
            'Temperatura foi salva',
        ], $messages);
    }

    public function testShouldNotSaveWhenTemperatureIsLowerThan150Degrees()
    {
        $temperature_measurement_repository_mock = $this->createMock(TemperatureMeasurementRepository::class);
        $logger_interface_mock = $this->createMock(LoggerInterface::class);
        $temperature_measurement_service = new TemperatureMeasurementService($temperature_measurement_repository_mock, $logger_interface_mock);

        $temperature_measurement_repository_mock->expects($this->never())->method('save');

        $messages = [];

        $logger_interface_mock->method('log')->will($this->returnCallback(function($message) use(&$messages) {
            $messages[] = $message;
        }));

        $temperature_measurement_service->save([
            'temperature' => 15,
        ]);

        $this->assertEquals([
            'Iniciando processo de salvamento',
        ], $messages);
    }
}
