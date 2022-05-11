<?php

namespace Tests\Unit\Services;

use App\Services\PositionMeasureService;
use PHPUnit\Framework\TestCase;

class PositionMeasureServiceTest extends TestCase
{
    // arithmeticAverage

    /**
     * @dataProvider provideArithmeticAverageCases
     */
    public function testArithmeticAverageCases($variable_values, $expected_result)
    {
        $position_measure_service = new PositionMeasureService();
        $arithmetic_average = $position_measure_service->arithmeticAverage($variable_values);
        $this->assertEquals($arithmetic_average, $expected_result);
    }

    public function provideArithmeticAverageCases()
    {
        return [
            'shouldBeValidWhenNumericArray' => [
                'variable_values' => [
                    9, 4, '2', '2', 1.4, 4, 10, 25, pi(),
                ],
                'expected_result' => 6.72684,
            ],
            'shouldBeValidWhenEmptyArray' => [
                'variable_values' => [],
                'expected_result' => 0,
            ],
        ];
    }

    // median

    /**
     * @dataProvider provideMedianCases
     */
    public function testMedianCases($values, $expected_result)
    {
        $position_measure_service = new PositionMeasureService();
        $median = $position_measure_service->median($values);
        $this->assertEquals($median, $expected_result);
    }

    public function provideMedianCases()
    {
        return [
            'shouldBeValidWhenPairArray' => [
                'values' => [
                    0, 1, 3, 5,
                ],
                'expected_result' => 2,
            ],
            'shouldBeValidWhenOddArray' => [
                'values' => [
                    0, 1, 3,
                ],
                'expected_result' => 1,
            ],
            'shouldBeValidWhenEmptyArray' => [
                'values' => [],
                'expected_result' => 0,
            ],
        ];
    }
}
