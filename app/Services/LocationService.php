<?php

namespace App\Services;

use App\contracts\IAffilates;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;

class LocationService
{
    private float $latFrom;
    private float $lonFrom;

    public function __construct(float $latFrom, float $lonFrom)
    {
        $this->latFrom = $latFrom;
        $this->lonFrom = $lonFrom;
    }


    public function getDistanceFrom(float $lat, float $lon, ?string $distUnit) :float
    {
        $theta = $this->lonFrom - $lon;
        $distance = (sin(deg2rad($this->latFrom)) * sin(deg2rad($lat))) + (cos(deg2rad($this->latFrom)) * cos(deg2rad($lat)) * cos(deg2rad($theta)));
        $distance = acos($distance);
        $distance = rad2deg($distance);
        $distance = $distance * 60 * 1.1515;
        switch($distUnit) {
            case 'miles':
                break;
            case 'km' :
            default:
                $distance = $distance * 1.609344;
        }
        return (round($distance,2));
    }


}
