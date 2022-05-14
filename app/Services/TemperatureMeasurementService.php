<?php

namespace App\Services;

use App\Interfaces\LoggerInterface;
use App\Interfaces\TemperatureMeasurementRepositoryInterface;

class TemperatureMeasurementService
{
    protected $temperature_measurement_repository;

    public function __construct(TemperatureMeasurementRepositoryInterface $temperature_measurement_repository, LoggerInterface $logger_interface)
    {
        $this->temperature_measurement_repository = $temperature_measurement_repository;
        $this->logger_interface = $logger_interface;
    }

    public function save(Array $data)
    {
        $this->logger_interface->log('Iniciando processo de salvamento');

        if($data['temperature'] >= 150) {
            $this->temperature_measurement_repository->save($data);
            $this->logger_interface->log('Temperatura foi salva');
        }
    }
}
