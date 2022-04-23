<?php

namespace App\Services;

use App\contracts\IAffilates;
use Illuminate\Support\Collection;

class AffiliatesService implements IAffilates
{
    private Collection $affiliates;
    private float $lon;
    private float $lat;

    public function __construct(float $lat = 53.3340285, float $lon =  -6.2535495)
    {
        $this->lat = $lat;
        $this->lon = $lon;
        $collection = collect(explode(PHP_EOL ,file_get_contents(__DIR__.'/../../database/text_db/affiliates.txt')));
        $this->affiliates = $collection->map(function($value) {
            $data =  json_decode($value);
            return $data;
        })->sortBy('affiliate_id');
    }

    public function getAffiliates()
    {
        return $this->affiliates;
    }

    public function getAffiliatesWithDistanceOf(int $distance)
    {
        $locationService = new LocationService($this->lat, $this->lon);
        return $this->affiliates->map(function($affiliate) use($locationService) {
            $affiliate->distance = $locationService->getDistanceFrom($affiliate->latitude,$affiliate->longitude, 'km');
            return $affiliate;
        })->filter(function($affiliate) use ($distance) {
            return $affiliate->distance <= $distance;
        });
    }

}
