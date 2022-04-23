<?php

namespace App\contracts;

interface IAffilates {
    public function getAffiliates();

    public function getAffiliatesWithDistanceOf(int $distance);

}
