<?php

namespace App\Services;

class UniformRectilinearMotionService
{
    public function displacement($initial_position, $final_position)
    {
        return $final_position - $initial_position;
    }

    public function averageSpeed($displacement, $time_variation)
    {
        return $time_variation > 0 ? ($displacement / $time_variation) : 0;
    }

    public function averageAcceleration($average_speed, $time_variation)
    {
        return $time_variation > 0 ? ($average_speed / $time_variation) : 0;
    }
}
