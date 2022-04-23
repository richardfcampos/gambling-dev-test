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
        $affiliates = $this->service->getAffiliates();
        return view('welcome', compact('affiliates'));
    }
}
