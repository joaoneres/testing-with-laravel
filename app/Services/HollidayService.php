<?php

namespace App\Services;

use App\Interfaces\HollidayRepositoryInterface;
use Illuminate\Support\Carbon;

class HollidayService
{
    public function __construct(HollidayRepositoryInterface $holliday_repository)
    {
        $this->holliday_repository = $holliday_repository;
    }

    public function is_holliday(String $date)
    {
        $all_hollidays = $this->holliday_repository->allAsArray();
        $formated_date = Carbon::parse($date)->format('m-d');

        $filltered_hollidays = array_filter($all_hollidays, function($holliday) use($formated_date) {
            return $holliday == $formated_date;
        });

        return count($filltered_hollidays) > 0;
    }
}
