<?php

namespace Tests\Unit;

use App\Services\AffiliatesService;
use App\Services\LocationService;
use PHPUnit\Framework\TestCase;

class LocationServiceTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    //from dublin
    const LAT = 53.3340285;
    const LON = -6.2535495;

    public function testLocationDistanceIsZero()
    {
        $locationService = new LocationService(self::LAT, self::LON);
        $distance = $locationService->getDistanceFrom(self::LAT, self::LON, 'km');
        $this->assertEquals(0, $distance);
    }

    /**
     * @dataProvider coordinatesProvider
     */
    public function testLocationShoudGetCorrectDistances($lat, $lon, $realDistance)
    {
        $locationService = new LocationService(self::LAT, self::LON);
        $distance = $locationService->getDistanceFrom($lat, $lon, 'km');
        $this->assertEquals($realDistance, $distance);
    }

    public function coordinatesProvider()
    {
        return [
            'should be 9.94' => [53.2451022, -6.238335, 9.94],
            'should be 98.93' => [53.038056, -7.653889, 98.93],
            'should be 130.86' => [52.240382, -6.972413, 130.86],
            'should be 278.12' => [51.999447, -9.742744, 278.12],

        ];

    }
}
