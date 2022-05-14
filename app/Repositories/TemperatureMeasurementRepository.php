<?php

namespace App\Repositories;

use App\Interfaces\TemperatureMeasurementRepositoryInterface;
use App\Models\TemperatureMeasurement;

class TemperatureMeasurementRepository implements TemperatureMeasurementRepositoryInterface
{
    public function save(Array $data)
    {
        return TemperatureMeasurement::create($data);
    }
}
