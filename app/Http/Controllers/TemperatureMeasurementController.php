<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddTemperatureMeasurementRequest;
use App\Services\TemperatureMeasurementService;

class TemperatureMeasurementController extends Controller
{
    protected $temperature_measurement_service;

    public function __construct(TemperatureMeasurementService $temperature_measurement_service)
    {
        $this->temperature_measurement_service = $temperature_measurement_service;
    }

    public function add()
    {
        return view('temperature-measurement.add');
    }

    public function save(AddTemperatureMeasurementRequest $request)
    {
        $this->temperature_measurement_service->save($request);
        return view('temperature-measurement.success');
    }
}
