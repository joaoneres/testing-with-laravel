<?php

namespace Tests\Unit\Services;

use App\Repositories\TemperatureMeasurementRepository;
use App\Services\TemperatureMeasurementService;
use PHPUnit\Framework\TestCase;

class TemperatureMeasurementServiceTest extends TestCase
{
    public function testShouldSaveWhenTemperatureIsEqualOrGreaterThan150Degrees()
    {
        $temperature_measurement_repository_mock = $this->createMock(TemperatureMeasurementRepository::class);
        $temperature_measurement_repository_mock->expects($this->once())->method('save');
        $temperature_measurement_service = new TemperatureMeasurementService($temperature_measurement_repository_mock);

        $temperature_measurement_service->save([
            'temperature' => 1520,
        ]);
    }

    public function testShouldNotSaveWhenTemperatureIsLowerThan150Degrees()
    {
        $temperature_measurement_repository_mock = $this->createMock(TemperatureMeasurementRepository::class);
        $temperature_measurement_repository_mock->expects($this->never())->method('save');
        $temperature_measurement_service = new TemperatureMeasurementService($temperature_measurement_repository_mock);

        $temperature_measurement_service->save([
            'temperature' => 15,
        ]);
    }
}
