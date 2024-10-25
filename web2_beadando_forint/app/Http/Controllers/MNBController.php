<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\MNBService;

class MNBController extends Controller
{
    protected $mnbService;

    public function __construct(MNBService $mnbService)
    {
        $this->mnbService = $mnbService;
    }

    public function index()
    {
        // Például hívj meg egy SOAP funkciót
        $result = $this->mnbService->call('GetCurrencies');
        //$result->GetCurrenciesResult();
        return response()->json($result);
    }
}
