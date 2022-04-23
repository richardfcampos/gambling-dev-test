<?php

namespace App\Services;

use App\contracts\IAffilates;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;

class AffiliatesService implements IAffilates
{
    private Collection $affiliates;

    public function __construct()
    {
        $collection = collect(explode(PHP_EOL ,File::get(base_path().'/database/text_db/affiliates.txt')));
        $this->affiliates = $collection->map(function($value) {
            $data =  json_decode($value);
            return $data;
        });
    }

    public function getAffiliates()
    {
        return $this->affiliates;
    }

    public function setDistanceFrom(float $lat1, float $lat2)
    {

    }


}
