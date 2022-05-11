<?php

namespace App\Services;

class PositionMeasureService
{
    public function arithmeticAverage(Array $variable_values)
    {
        $sum = collect($variable_values)->reduce(function($sum, $value) {
            return $value + $sum;
        }, 0);

        return count($variable_values) > 0 ? round($sum / count($variable_values), 5) : 0;
    }

    public function median(Array $values)
    {
        sort($values);
        $values_count = count($values);

        if(count($values) == 0) {
            return 0;
        }

        if(($values_count % 2) > 0) {
            return $values[(Int) $values_count / 2];
        } else {
            return ($values[($values_count / 2) - 1] + $values[$values_count / 2]) / 2;
        }
    }
}
