<?php

namespace Tests\Unit\Services;

use App\Repositories\HollidayRepository;
use App\Services\HollidayService;
use PHPUnit\Framework\TestCase;

class HollidayServiceTest extends TestCase
{
    /**
     * @test
     * @dataProvider provideIsHollidayCases
    */

    public function testIsHollidayCases(Array $dates, String $value, Bool $expected_result)
    {
        $holliday_repository_mock = $this->createMock(HollidayRepository::class);
        $holliday_repository_mock->method('allAsArray')->willReturn($dates);
        $holliday_service = new HollidayService($holliday_repository_mock);
        $result = $holliday_service->is_holliday($value);
        $this->assertEquals($expected_result, $result);
    }

    public function provideIsHollidayCases()
    {
        return [
            'shouldBeInvalidWithNoRelatedDate' => [
                'dates' => ['02-01', '10-15', '12-25', '09-10'],
                'value' => '2001-10-10',
                'expected_result' => false,
            ],
            'shouldBeValidWithRelatedDate' => [
                'dates' => ['02-01', '10-15', '12-25', '09-10'],
                'value' => '2021-09-10',
                'expected_result' => true,
            ],
            'shouldBeInvalidWithNoStringDate' => [
                'dates' => ['02-01', '10-15', '12-25', '09-10'],
                'value' => '',
                'expected_result' => false,
            ],
            'shouldBeInvalidWithNoHollidayDates' => [
                'dates' => [],
                'value' => '2001-10-15',
                'expected_result' => false,
            ],
        ];
    }
}
