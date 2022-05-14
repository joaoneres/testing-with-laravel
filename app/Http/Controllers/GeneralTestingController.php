<?php

namespace App\Http\Controllers;

use App\Services\HollidayService;
use Illuminate\Http\Request;

class GeneralTestingController extends Controller
{
    public function __construct(HollidayService $holliday_service)
    {
        $this->holliday_service = $holliday_service;
    }

    public function is_holliday(String $date)
    {
        return response()->json([
            'is_holliday' => $this->holliday_service->is_holliday($date),
        ], 200);
    }
}
