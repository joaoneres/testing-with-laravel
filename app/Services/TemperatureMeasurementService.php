<?php

namespace App\Services;

use App\Interfaces\TemperatureMeasurementRepositoryInterface;

class TemperatureMeasurementService
{
    protected $temperature_measurement_repository;

    public function __construct(TemperatureMeasurementRepositoryInterface $temperature_measurement_repository)
    {
        $this->temperature_measurement_repository = $temperature_measurement_repository;
    }

    public function save(Array $data)
    {
        if($data['temperature'] >= 150) {
            $this->temperature_measurement_repository->save($data);
        }
    }
}
