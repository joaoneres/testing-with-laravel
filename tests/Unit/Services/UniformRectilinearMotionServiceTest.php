<?php

namespace Tests\Unit\Services;

use App\Services\UniformRectilinearMotionService;
use PHPUnit\Framework\TestCase;

class UniformRectilinearMotionServiceTest extends TestCase
{
    // displacement

    public function testDisplacementShouldBeValidWithNaturalNumbers()
    {
        $uniform_rectilinear_motion_service = new UniformRectilinearMotionService();
        $displacement = $uniform_rectilinear_motion_service->displacement(0, 3);
        $this->assertEquals(3, $displacement);
    }

    public function testDisplacementShouldBeValidWithRealNumbers()
    {
        $uniform_rectilinear_motion_service = new UniformRectilinearMotionService();
        $displacement = $uniform_rectilinear_motion_service->displacement(-5, -1);
        $this->assertEquals(4, $displacement);
    }

    public function testDisplacementShouldBeValidWithRationalNumbers()
    {
        $uniform_rectilinear_motion_service = new UniformRectilinearMotionService();
        $displacement = $uniform_rectilinear_motion_service->displacement(pi(), exp(1));
        $this->assertEquals(-0.423, round($displacement, 3));
    }

    // averageSpeed

    public function testAverageSpeedShouldBeValidWithNaturalNumbers()
    {
        $uniform_rectilinear_motion_service = new UniformRectilinearMotionService();
        $displacement = $uniform_rectilinear_motion_service->displacement(0, 3);
        $average_speed = $uniform_rectilinear_motion_service->averageSpeed($displacement, 3);
        $this->assertEquals(1, $average_speed);
    }

    public function testAverageSpeedShouldBeValidWithRealNumbers()
    {
        $uniform_rectilinear_motion_service = new UniformRectilinearMotionService();
        $displacement = $uniform_rectilinear_motion_service->displacement(-5, -1);
        $average_speed = $uniform_rectilinear_motion_service->averageSpeed($displacement, 2);
        $this->assertEquals(2, $average_speed);
    }

    public function testAverageSpeedShouldBeValidWithRationalNumbers()
    {
        $uniform_rectilinear_motion_service = new UniformRectilinearMotionService();
        $displacement = $uniform_rectilinear_motion_service->displacement(pi(), exp(1));
        $average_speed = $uniform_rectilinear_motion_service->averageSpeed($displacement, pi());
        $this->assertEquals(-0.135, round($average_speed, 3));
    }

    public function testAverageSpeedShouldBeZeroWithZeroTimeVariation()
    {
        $uniform_rectilinear_motion_service = new UniformRectilinearMotionService();
        $displacement = $uniform_rectilinear_motion_service->displacement(5, 0);
        $average_speed = $uniform_rectilinear_motion_service->averageSpeed($displacement, 0);
        $this->assertEquals(0, round($average_speed, 3));
    }

    // averageAcceleration

    public function testAverageAccelerationShouldBeValidWithNaturalNumbers()
    {
        $uniform_rectilinear_motion_service = new UniformRectilinearMotionService();
        $average_acceleration = $uniform_rectilinear_motion_service->averageAcceleration(3, 3);
        $this->assertEquals(1, $average_acceleration);
    }

    public function testAverageAccelerationShouldBeValidWithRealNumbers()
    {
        $uniform_rectilinear_motion_service = new UniformRectilinearMotionService();
        $average_acceleration = $uniform_rectilinear_motion_service->averageAcceleration(-5, 2);
        $this->assertEquals(-2.5, $average_acceleration);
    }

    public function testAverageAccelerationShouldBeValidWithRationalNumbers()
    {
        $uniform_rectilinear_motion_service = new UniformRectilinearMotionService();
        $average_acceleration = $uniform_rectilinear_motion_service->averageAcceleration(exp(1), pi());
        $this->assertEquals(0.865, round($average_acceleration, 3));
    }

    public function testAverageAccelerationShouldBeZeroWithZeroTimeVariation()
    {
        $uniform_rectilinear_motion_service = new UniformRectilinearMotionService();
        $average_acceleration = $uniform_rectilinear_motion_service->averageAcceleration(4.2, 0);
        $this->assertEquals(0, round($average_acceleration, 3));
    }
}
