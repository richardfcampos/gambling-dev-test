<?php

namespace Tests\Unit;

use App\Services\AffiliatesService;
use PHPUnit\Framework\TestCase;

class AffiliatesServiceTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    //from dublin
    const LAT = 53.3340285;
    const LON = -6.2535495;

    public function testAffiliatesCount()
    {
        $affiliatesService = new AffiliatesService(self::LAT, self::LON);
        $affiliates = $affiliatesService->getAffiliates();
        $this->assertEquals($affiliates->count(), 32);
    }

    public function testGetAffiliatesWithDistance()
    {
        $affiliatesService = new AffiliatesService(self::LAT, self::LON);
        $affiliates = $affiliatesService->getAffiliatesWithDistanceOf(100);
        $affiliates->map(function ($affiliate) {
           $this->assertLessThanOrEqual(100, $affiliate->distance);
        });
    }

    public function testGetAffiliatesOrderByAffiliatesId()
    {
        $affiliatesService = new AffiliatesService(self::LAT, self::LON);
        $affiliates = $affiliatesService->getAffiliates(100)->toArray();
        $lastKey = null;
        foreach ($affiliates as $key => $affiliate) {
            if (!is_null($lastKey)) {
                $this->assertLessThanOrEqual($affiliate->affiliate_id, $affiliates[$lastKey]->affiliate_id);
            }
            $lastKey = $key;
        }

    }

    public function testGetAffiliatesOrderByAffiliatesIdWithDistance()
    {
        $affiliatesService = new AffiliatesService(self::LAT, self::LON);
        $affiliates = $affiliatesService->getAffiliatesWithDistanceOf(100)->toArray();
        $lastKey = null;
        foreach ($affiliates as $key => $affiliate) {
            if (!is_null($lastKey)) {
                $this->assertLessThanOrEqual($affiliate->affiliate_id, $affiliates[$lastKey]->affiliate_id);
            }
            $lastKey = $key;
        }

    }
}
