<?php

namespace App\Repositories;

use App\Interfaces\HollidayRepositoryInterface;
use App\Models\Holliday;

class HollidayRepository implements HollidayRepositoryInterface
{
    public function allAsArray() : Array
    {
        return Holliday::all()->pluck('date')->toArray();
    }
}
