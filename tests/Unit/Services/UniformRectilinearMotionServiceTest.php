<?php

namespace Tests\Unit\Services;

use App\Services\UniformRectilinearMotionService;
use PHPUnit\Framework\TestCase;

class UniformRectilinearMotionServiceTest extends TestCase
{
    // displacement

    /**
     * @dataProvider provideDisplacementCases
     */
    public function testDisplacementCases($initial_position, $final_position, $expected_result)
    {
        $uniform_rectilinear_motion_service = new UniformRectilinearMotionService();
        $displacement = $uniform_rectilinear_motion_service->displacement($initial_position, $final_position);
        $this->assertEquals($displacement, $expected_result);
    }

    public function provideDisplacementCases()
    {
        return [
            'shouldBeValidWithNaturalNumbers' => [
                'initial_position' => 0,
                'final_position' => 3,
                'expected_result' => 3,
            ],
            'shouldBeValidWithRealNumbers' => [
                'initial_position' => -5,
                'final_position' => -1,
                'expected_result' => 4,
            ],
            'shouldBeValidWithRationalNumbers' => [
                'initial_position' => pi(),
                'final_position' => exp(1),
                'expected_result' => -0.423310825130748,
            ],
        ];
    }

    // averageSpeed

    /**
     * @dataProvider provideAverageSpeedAndAverageAccelerationCases
     */
    public function testAverageSpeedCases($displacement, $time_variation, $expected_result)
    {
        $uniform_rectilinear_motion_service = new UniformRectilinearMotionService();
        $average_speed = $uniform_rectilinear_motion_service->averageSpeed($displacement, $time_variation);
        $this->assertEquals($average_speed, $expected_result);
    }

    // averageAcceleration

    /**
     * @dataProvider provideAverageSpeedAndAverageAccelerationCases
     */
    public function testAverageAccelerationCases($average_speed, $time_variation, $expected_result)
    {
        $uniform_rectilinear_motion_service = new UniformRectilinearMotionService();
        $average_acceleration = $uniform_rectilinear_motion_service->averageAcceleration($average_speed, $time_variation);
        $this->assertEquals($average_acceleration, $expected_result);
    }

    public function provideAverageSpeedAndAverageAccelerationCases()
    {
        return [
            'shouldBeValidWithNaturalNumbers' => [
                'displacement' => 3,
                'time_variation' => 3,
                'expected_result' => 1,
            ],
            'shouldBeValidWithRealNumbers' => [
                'displacement' => -7,
                'time_variation' => 2,
                'expected_result' => -3.5,
            ],
            'shouldBeValidWithRationalNumbers' => [
                'displacement' => pi(),
                'time_variation' => pi(),
                'expected_result' => 1,
            ],
            'shouldBeZeroWithZeroTimeVariation' => [
                'displacement' => pi(),
                'time_variation' => 0,
                'expected_result' => 0,
            ],
        ];
    }
}
