<?php

namespace App\Services;

use App\Interfaces\TemperatureMeasurementRepositoryInterface;
use Illuminate\Http\Request;

class TemperatureMeasurementService
{
    protected $temperature_measurement_repository;

    public function __construct(TemperatureMeasurementRepositoryInterface $temperature_measurement_repository)
    {
        $this->temperature_measurement_repository = $temperature_measurement_repository;
    }

    public function save(Request $request)
    {
        if($request->temperature >= 150) {
            $this->temperature_measurement_repository->save($request->all());
        }
    }
}
