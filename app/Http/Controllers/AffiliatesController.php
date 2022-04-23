<?php

namespace App\Http\Controllers;

use App\contracts\IAffilates;
use App\Services\AffiliatesService;

class AffiliatesController extends Controller
{
    private IAffilates $service;

    public function __construct(AffiliatesService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $distance = 100;
        $affiliates = $this->service->getAffiliatesWithDistanceOf($distance);
        $background = base_path().'/resources/images/dublin.jpg';
        return view('dublin-distance', compact('affiliates', 'distance', 'background'));
    }
}
